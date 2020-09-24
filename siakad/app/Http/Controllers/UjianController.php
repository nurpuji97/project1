<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListUjian;
use App\Guru;
use App\Mapel;
use App\Semester;
use App\SoalUjian;
use App\JawabUjian;
use App\Kelas;
use App\Siswa;
use App\Rombel;
use App\NilaiRaport;
use App\Ruangan;

class UjianController extends Controller
{

    public function lihatlistujian()
    {
        $index = ListUjian::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $siswa = auth()->user()->siswa;
        $ruang = Ruangan::all();

        return view('ujian.listujian', compact('mapel','index','sem','guru','siswa','kelas','ruang'));
    }

    public function lihatlistujianguru()
    {
        $index = ListUjian::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $guru2 = auth()->user()->guru;
        $ruang = Ruangan::all();

        return view('ujian.listguru', compact('mapel','index','sem','guru','kelas','guru2','ruang'));
    }

    public function addlistujian(Request $request)
    {
        $listujian = ListUjian::create($request->all());
        return redirect()->back()->with('sukses', 'data Telah di tambahkan');
    }

    public function editlistujian($id)
    {
        $listujian = ListUjian::find($id);
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $guru2 = auth()->user()->guru;
        $ruang = Ruangan::all();

        return view('ujian.editlistujian', compact('mapel','listujian','sem','guru','kelas','guru2','ruang'));
    }

    public function updatelistujian(Request $request, $id)
    {
        $listujian = ListUjian::find($id);
        $listujian->update($request->all());
        return redirect()->back()->with('sukses', 'data Telah update');
    }

    public function deletelistujian($id)
    {
        $listujian = ListUjian::find($id);
        $listujian->delete($listujian);
  
        return redirect()->back()->with('sukses', 'data Telah di hapus');
    }

    public function buatsoal($id)
    {
        $listujian = ListUjian::find($id);
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $soal = SoalUjian::all();
        $guru2 = auth()->user()->guru;

        return view('ujian.buatsoal', compact('soal','mapel','listujian','sem','guru','kelas','guru2'));
    }

    public function addsoal(Request $request, $id)
    {
        $listujian = ListUjian::find($id);
        $soal = SoalUjian::create($request->all());
        if($request->hasFile('soal_gambar')){ //memasukan avatar kedalam file image
            $request->file('soal_gambar')->move('images/',$request->file('soal_gambar')->getClientOriginalName());
            $soal->soal_gambar = $request->file('soal_gambar')->getClientOriginalName();
            $soal->save();
        }

        return redirect()->back()->with('sukses', 'data Telah di tambahkan');
    }

    public function editadd(Request $request, $idlist, $idsoal)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);
        $guru = Guru::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("semester_id");
        $kelas = Kelas::all();
        $guru2 = auth()->user()->guru;

        return view('ujian.editsoal', compact('soal','mapel','listujian','sem','guru','kelas','guru2'));
    }

    public function updatesoal(Request $request, $idlist, $idsoal)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);
        $soal->update($request->all());

        return redirect()->back()->with('sukses', 'data Telah update');
    }

    public function hapussoal($idlist, $idsoal)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);
        $soal->delete($soal);
  
        return redirect()->back()->with('sukses', 'data Telah di hapus');
    }

    public function lihatjawaban($idlist, $idsoal)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);
        $jawab = JawabUjian::all();

        return view('ujian.lihatjawab', compact('listujian','siswa','soal'));
    }

    public function addjawaban(Request $request, $idlist, $idsoal)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);

        $jawab = JawabUjian::create($request->all());

        return redirect()->back()->with('sukses', 'data Telah di tambahkan');
    }

    public function hapusjawab($idlist, $idsoal, $idjawab)
    {
        $listujian = ListUjian::find($idlist);
        $soal = SoalUjian::find($idsoal);
        $jawab = JawabUjian::find($idjawab);

        $jawab->delete($jawab);
  
        return redirect()->back()->with('sukses', 'data Telah di hapus');
    }

    public function indexujian($id)
    {
        $siswa = auth()->user()->siswa;
        $listujian = ListUjian::find($id);
        $soal = SoalUjian::all();

        return view('ujian.homeujian', compact('listujian','siswa','soal'));
    }

    public function soalujian($id)
    {

        $siswa = auth()->user()->siswa;
        $listujian = ListUjian::find($id);
        $siswa2 = Siswa::all();
        $soal = SoalUjian::first();
        $jawab = JawabUjian::all();
        $rom = Rombel::orderBy('kelas_id','asc')->get();

        return view('ujian.ujiansoal', compact('listujian','siswa','siswa2','jawab','rom'));
    }

    public function hasilujian(Request $request, $id)
    {

        $listujian = ListUjian::find($id);
        $siswa2 = Siswa::all();
        $siswa = auth()->user()->siswa;
        $rom = Rombel::orderBy('kelas_id','asc')->get();

        $test = $request->jawaban;
        $rt = 0;

        foreach ($test as $k) {
            if($k == 1){
                $rt++;
            }
        }

        return view('ujian.finalujian', compact('listujian','test','rt','siswa2','siswa','rom'));
    }

    public function hasilpts(Request $request, $id)
    {

        $listujian = ListUjian::find($id);

        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilpts = $request->nilaipts;

        NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_pts' => $nilpts]);
        
        return redirect('list')->with('sukses', 'Anda Telah Mengerjakan Ujian Tengah Semester');
    }

    public function hasilpas(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $nilaipas = $request->nilaipas;

        NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_pas' => $nilaipas]);
        
        return redirect('list')->with('sukses', 'Anda Telah Mengerjakan Ujian Akhir Semester');
    }

}