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
use App\Reprakem;
use App\NilaiRaport;
use App\Rekniltu;
use DB;

class OlahNilaiController extends Controller
{
    public function index()
    {
        $reprakem = Reprakem::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.penilpra', compact('sem','kelas','siswa','rom','mapel','reprakem'));
    }

    public function cari(Request $request)
    {
       $reprakem = Reprakem::all();
       $kelas = Kelas::all();
       $mapel = Mapel::all();
       $sem = Semester::all()->sortByDesc("id"); 
       
       $rmapel = $request->mapel_id;
       $rsem = $request->semester_id;
       $rkelas = $request->kelas_id;
       $index = DB::table('reprakems')
               ->where('mapel_id','like',"%".$rmapel."%")
               ->orWhere('semester_id','like',"%".$rsem."%")
               ->orWhere('kelas_id','like',"%".$rkelas."%")
               ->get(); 

      if(!$index->isEmpty()){
        return view('olahnilai.penilpra', compact('index','mapel','sem','kelas','rmapel','rsem','rkelas','reprakem'));
      } else {
        return redirect('index')->with('sukses', 'data tidak ada');
      }                 

    }

    public function editnilpra($id)
    {
        $reprakem = Reprakem::find($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.editpenilpra', compact('sem','kelas','siswa','rom','mapel','reprakem'));
    }

    public function lihatpeniltug()
    {
        $reniltug = Rekniltu::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.peniltug', compact('sem','kelas','siswa','rom','mapel','reniltug'));
    }

    public function caritug(Request $request)
    {
       $reniltug = Rekniltu::all();
       $kelas = Kelas::all();
       $mapel = Mapel::all();
       $sem = Semester::all()->sortByDesc("id"); 
       
       $rmapel = $request->mapel_id;
       $rsem = $request->semester_id;
       $rkelas = $request->kelas_id;
       $index = DB::table('rekniltu')
               ->where('mapel_id','like',"%".$rmapel."%")
               ->orWhere('semester_id','like',"%".$rsem."%")
               ->orWhere('kelas_id','like',"%".$rkelas."%")
               ->get(); 

      if(!$index->isEmpty()){
        return view('olahnilai.peniltug', compact('index','mapel','sem','kelas','rmapel','rsem','rkelas','reniltug'));
      } else {
        return redirect('rekniltugas')->with('sukses', 'data tidak ada');
      }                 

    }

    public function editniltug($id)
    {
        $reniltug = Rekniltu::find($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.editpeniltug', compact('sem','kelas','siswa','rom','mapel','reniltug'));
    }

    public function innilpro(Request $request)
    {
      $siswa = $request->siswa_id;
      $mapel = $request->mapel_id;
      $semes = $request->semester_id;
      $kelas = $request->kelas_id;
      $nilai_prak = $request->nilai_prak;

      Reprakem::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_prak' => $nilai_prak]);

      NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_prak' => $nilai_prak]);

      return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function innilpra(Request $request)
    {
      $siswa = $request->siswa_id;
      $mapel = $request->mapel_id;
      $semes = $request->semester_id;
      $kelas = $request->kelas_id;
      $nilai_prak = $request->nilai_total;

      NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_pro' => $nilai_prak]);

      return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function inniltug(Request $request)
    {
      $siswa = $request->siswa_id;
      $mapel = $request->mapel_id;
      $semes = $request->semester_id;
      $kelas = $request->kelas_id;
      $nilai_tug = $request->nilai_tugas;

      Rekniltu::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_tugas' => $nilai_tug]);

      NilaiRaport::where('siswa_id', $siswa)->where('mapel_id', $mapel)->where('semester_id', $semes)->where('kelas_id', $kelas)->update(['nilai_tugas' => $nilai_tug]);

      return redirect()->back()->with('sukses', 'data Telah Dimasukan');
    }

    public function readnilai()
    {
        $nilrap = NilaiRaport::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.nilaikes', compact('sem','kelas','siswa','rom','mapel','nilrap'));
    }

    public function editnilai($id)
    {
        $nilrap = NilaiRaport::find($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id"); 

        return view('olahnilai.editnilkes', compact('sem','kelas','siswa','rom','mapel','nilrap'));
    }

    public function readnilaisis()
    {
        $nilrap = NilaiRaport::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id");
        $siswa = auth()->user()->siswa; 

        return view('olahnilai.nilkessis', compact('sem','kelas','siswa','rom','mapel','nilrap'));
    }

    public function linilsis($id)
    {
        $nilrap = NilaiRaport::find($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $sem = Semester::all()->sortByDesc("id");

        return view('olahnilai.linilkessis', compact('sem','kelas','rom','mapel','nilrap'));
    }

    public function updatenilai(Request $request, $id)
    {
        $nilrap = NilaiRaport::find($id);
        $nilrap->update($request->all());
        return redirect('nilrap')->with('sukses', 'data Telah update');
    }

    public function carinilsis(Request $request)
    {
       $nilrap = NilaiRaport::all();
       $kelas = Kelas::all();
       $sem = Semester::all()->sortByDesc("id");
       $siswa = auth()->user()->siswa; 
       
       $rsem = $request->semester_id;
       $rkelas = $request->kelas_id;
       $index = DB::table('nilairaport')
               ->Where('semester_id','like',"%".$rsem."%")
               ->orWhere('kelas_id','like',"%".$rkelas."%")
               ->get(); 

      if(!$index->isEmpty()){
        return view('olahnilai.nilkessis', compact('index','mapel','sem','siswa','kelas','rsem','rkelas','reniltug'));
      } else {
        return redirect('raport')->with('sukses', 'data tidak ada'); 
      }                 

    }

    public function carinil(Request $request)
    {
       $nilrap = NilaiRaport::all();
       $kelas = Kelas::all();
       $mapel = Mapel::all();
       $sem = Semester::all()->sortByDesc("id"); 
       
       $rmapel = $request->mapel_id;
       $rsem = $request->semester_id;
       $rkelas = $request->kelas_id;
       $index = DB::table('nilairaport')
               ->where('mapel_id','like',"%".$rmapel."%")
               ->orWhere('semester_id','like',"%".$rsem."%")
               ->orWhere('kelas_id','like',"%".$rkelas."%")
               ->get(); 

      if(!$index->isEmpty()){
        return view('olahnilai.nilaikes', compact('index','mapel','sem','kelas','rmapel','rsem','rkelas','nilrap'));
      } else {
        return redirect('nilrap')->with('sukses', 'data tidak ada');
      }                 

    }
    
}
