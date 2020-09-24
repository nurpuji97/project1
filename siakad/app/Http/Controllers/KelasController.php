<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Guru;
use App\Kompeahli;
use DB;

class KelasController extends Controller
{
    public function index()
    {
        $index = Kelas::all();
        $guru = Guru::all();
        $kom = Kompeahli::all();

        return view('kelas.index', compact('index','guru','kom'));
    }

    public function cari(Request $request)
    {
       $cari = $request->cari;
       $index = DB::table('kelas')
               ->where('rombel','like',"%".$cari."%")
               ->paginate(); 

      if(!$index->isEmpty()){
        return view('kelas.index', compact('index','cari'));
      } else {
        return redirect('kelas')->with('sukses', 'data tidak ada');
      }                 


    }

    public function tambahkelas(Request $request)
    {
        $validateData = $request->validate([
            'tingkat' => 'required',
            'kompeahli_id' => 'required',
            'rombel' => 'required',

          ]);

        $kelas = Kelas::create($request->all());
        return redirect('kelas')->with('sukses', 'data Telah Dimasukan');
    }

    public function editsiswa($id)
	  {
      $kelas = Kelas::find($id);
      $kom = Kompeahli::all();

	    return view('kelas.edit', compact('kelas','kom'));
    }

    public function updatekelas(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update($request->all());
        return redirect('kelas')->with('sukses', 'data Telah update');
    }

    public function deletekelas($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete($kelas);
  
        return redirect('kelas')->with('sukses', 'data Telah Di Hapus');
    }

}
