<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\JurnalSikap;
use App\Siswa;
use App\Kelas;
use App\NilaiKarakter;

class JurnalSikapController extends Controller
{
    public function index()
    {
        $index = JurnalSikap::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $nk = NilaiKarakter::all();

        return view('manajemendata.jurnalsikap', compact('index','siswa','kelas','nk'));
    }

    public function addjurnal(Request $request)
    {
        $jurnal = JurnalSikap::create($request->all());
        return redirect('jurnalsikap')->with('sukses', 'data Telah Dimasukan');
    }

    public function editjurnal($id)
    {
        $index = JurnalSikap::find($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $nk = NilaiKarakter::all();

        return view('manajemendata.editjurnalsikap', compact('index','siswa','kelas','nk'));
    }

    public function updatejurnal(Request $request,$id)
    {
        $index = JurnalSikap::find($id);
        $index->update($request->all());
        return redirect('jurnalsikap')->with('sukses', 'data Telah update');
    }

    public function deletejurnal($id)
    {
        $index = JurnalSikap::find($id);
        $index->delete($index);
  
        return redirect('jurnalsikap')->with('sukses', 'data Telah Di Hapus');
    }
}
