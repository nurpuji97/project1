<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rombel;
use App\Siswa;
use App\Kelas;
use DB;

class RombelController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $index = Rombel::orderBy('kelas_id','asc')->paginate(10);

        return view('manajemendata.rombel', compact('index','kelas','siswa'));
    }


    public function inputrombel(Request $request)
    {
        $index = Rombel::create($request->all());
        return redirect('rombel')->with('sukses', 'data Telah Dimasukan');
    }

    public function editrombel($id)
    {
        $index = Rombel::find($id);
        $kelas = Kelas::all();
        $siswa = Siswa::all();

        return view('manajemendata.editrombel', compact('index','kelas','siswa'));
    }

    public function updaterombel(Request $request,$id)
    {
        $index = Rombel::find($id);
        $index->update($request->all());
        return redirect('rombel')->with('sukses', 'data Telah update');
    }

    public function deleterombel($id)
    {
        $index = Rombel::find($id);
        $index->delete($index);
  
        return redirect('rombel')->with('sukses', 'data Telah Di Hapus');
    }


}
