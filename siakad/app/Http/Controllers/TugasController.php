<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekniltu;
use App\listabsen;
use App\Guru;
use App\Mapel;
use App\Semester;
use App\Kelas;
use App\Rombel;
use App\NilaiRaport;
use App\Reprakem;
use App\Absensi;
use App\Siswa;
use App\Ruangan;

class TugasController extends Controller
{

    public function listabsen()
    {
        $index = listabsen::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $ruang = Ruangan::all();

        return view('tugas.listab', compact('mapel','index','sem','guru','kelas','ruang'));
    }

    public function listtugas()
    {
        $index = listabsen::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();

        return view('tugas.listtug', compact('mapel','index','sem','guru','kelas'));
    }

    public function listabsenguru()
    {
        $index = listabsen::all();
        $guru2 = auth()->user()->guru;
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();

        return view('tugas.listabguru', compact('mapel','index','sem','guru2','kelas'));
    }

    public function listtugasguru()
    {
        $index = listabsen::all();
        $guru2 = auth()->user()->guru;
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();

        return view('tugas.listtugguru', compact('mapel','index','sem','guru2','kelas'));
    }

    public function addlistabsen(Request $request)
    {
        $list = listabsen::create($request->all());
        return redirect()->back()->with('sukses', 'data Telah di tambahkan');
    }

    public function editabsenguru($id)
    {
        $list = listabsen::find($id);
        $guru2 = auth()->user()->guru;
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $guru = Guru::all();
        $ruang = Ruangan::all();

        return view('tugas.editabsen', compact('mapel','list','sem','guru2','guru','kelas','ruang'));
    }

    public function updateabsenguru(Request $request, $id)
    {
        $list = listabsen::find($id);
        $list->update($request->all());

        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $bobot_ter = $request->b_ter;
        $bobot_kem = $request->b_kem;

        NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['b_ter' => $bobot_ter, 'b_kem' => $bobot_kem]);

        return redirect()->back()->with('sukses', 'data Telah update');
    }

    public function deleteabsenguru($id)
    {
        $list = listabsen::find($id);
        $list->delete($list);
  
        return redirect()->back()->with('sukses', 'data Telah di hapus');
    }

    public function addabsensi($id)
    {
        $absen = listabsen::find($id);
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $rom = Rombel::orderBy('kelas_id','asc')->get();
        $siswa = Siswa::all();

        return view('tugas.lisabsen', compact('mapel','absen','sem','guru','siswa','kelas','rom'));
    }

    public function innilsis(Request $request, $id)
    {

        $absen = listabsen::find($id);

        $ab = new Absensi;
        $ab->listabsen_id = $request->listabsen_id;
        $ab->siswa_id = $request->siswa_id;
        $ab->save();
        
        $rek = new Rekniltu;
        $rek->siswa_id = $request->siswa_id;
        $rek->kelas_id = $request->kelas_id;
        $rek->mapel_id = $request->mapel_id;
        $rek->semester_id = $request->semester_id;
        $rek->save();

        $rep = new Reprakem;
        $rep->siswa_id = $request->siswa_id;
        $rep->kelas_id = $request->kelas_id;
        $rep->mapel_id = $request->mapel_id;
        $rep->semester_id = $request->semester_id;
        $rep->save();

        $nil = new NilaiRaport;
        $nil->siswa_id = $request->siswa_id;
        $nil->kelas_id = $request->kelas_id;
        $nil->mapel_id = $request->mapel_id;
        $nil->semester_id = $request->semester_id;
        $nil->b_ter = $request->b_ter;
        $nil->b_kem = $request->b_kem;
        $nil->save();
        
        return redirect()->back()->with('sukses','data masuk');
    }

    public function inputtugas($id)
    {
        $absen = listabsen::find($id);
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $rom = Rombel::orderBy('kelas_id','asc')->get();
        $siswa = Siswa::all();

        return view('tugas.inniltug', compact('mapel','absen','sem','guru','siswa','kelas','rom'));# code...
    }

    public function addniltug1(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug1' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug2(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug2' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug3(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug3' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug4(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug4' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug5(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug5' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug6(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug6' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug7(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug7' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug8(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug8' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug9(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug9' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug10(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug10' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug11(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug11' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function addniltug12(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilai_tugas = $request->nilai_total;

        Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['tug12' => $nilai_tugas]);

        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

}
