<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListSkorKinerja;
use App\Guru;
use App\Semester;
use App\Kelas;
use App\Mapel;
use App\Lemskokin;
use App\Siswa;
use App\Rombel;
use App\Reprakem;
use App\Ruangan;
use DB;

class KemampuanController extends Controller
{
    public function index()
    {
       $index = ListSkorKinerja::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 
        $ruang = Ruangan::all();

        return view('nilkem.list', compact('index','sem','kelas','guru','mapel','ruang'));
    }

    public function tambahlistkin(Request $request)
    {
        $kin = ListSkorKinerja::create($request->all());
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function editlist($id)
    {
        $kin = ListSkorKinerja::find($id);
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id");
        $ruang = Ruangan::all(); 

        return view('nilkem.editlist', compact('kin','sem','kelas','guru','mapel','ruang'));
    }

    public function updatelistkin(Request $request,$id)
    {
        $kin = ListSkorKinerja::find($id);
        $kin->update($request->all());
  
        return redirect()->back()->with('sukses', 'data Telah Di Update');
    }

    public function hapuslistkin($id)
    {
        $kin = ListSkorKinerja::find($id);
        $kin->delete($kin);
  
        return redirect()->back()->with('sukses', 'data Telah Di Hapus');
    }

    public function lemskokin($id)
    {
        $kin = ListSkorKinerja::find($id);
        $skokin = Lemskokin::all();
        $siswa = Siswa::all();
        $rom = Rombel::orderBy('kelas_id','asc')->get();

        return view('nilkem.lemkokin', compact('kin','skokin','siswa','rom'));
    }

    public function insertlemsko(Request $request,$id)
    {
        $kin = ListSkorKinerja::find($id);
        $skokinlem = Lemskokin::create($request->all());
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function hapuslemsko($idkin, $idlem)
    {
        $kin = ListSkorKinerja::find($idkin);
        $skokinlem = Lemskokin::find($idlem);

        $skokinlem->delete($skokinlem);
  
        return redirect()->back()->with('sukses', 'data Telah Di Hapus');

    }

    public function lemskopro($id)
    {
        $kin = ListSkorKinerja::find($id);
        $skokin = Lemskokin::all();
        $siswa = Siswa::all();
        $rom = Rombel::orderBy('kelas_id','asc')->get();

        return view('nilkem.lemkopro', compact('kin','skokin','siswa','rom'));
    }

    public function insertlemskopro(Request $request,$id)
    {
        $kin = ListSkorKinerja::find($id);
        $skokinlem = Lemskokin::create($request->all());
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function hapuslemskopro($idkin, $idlem)
    {
        $kin = ListSkorKinerja::find($idkin);
        $skokinlem = Lemskokin::find($idlem);

        $skokinlem->delete($skokinlem);
  
        return redirect()->back()->with('sukses', 'data Telah Di Hapus');

    }

    public function addrekpra(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $niltot = $request->nilai_total;

        Reprakem::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['praktik_1' => $niltot]);
        
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function uptaddrekpra2(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $niltot = $request->nilai_total;

        Reprakem::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['praktik_2' => $niltot]);
        
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function uptaddrekpra3(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $niltot = $request->nilai_total;

        Reprakem::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['praktik_3' => $niltot]);
        
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function uptaddrekpra4(Request $request)
    {
        $siswa = $request->siswa_id;
        $mapel = $request->mapel_id;
        $semes = $request->semester_id;
        $kelas = $request->kelas_id;
        $niltot = $request->nilai_total;

        Reprakem::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['praktik_4' => $niltot]);
        
        return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }
}
