<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NilaiKarakter;
use App\Semester;
use App\Kompeahli;
use App\Ruangan;

class AdminController extends Controller
{

    public function indexcbt()
    {
		  return view('mastercbt.master');
    }

    public function index()
    {
		  return view('masterklien.master');
    }

    public function test()
    {
		return view('siswa.test');
    }

    public function lihatnuppk()
    {
      $index = NilaiKarakter::all();
      return view('penilaiansikap.nuppk', compact('index'));
    }

    public function inputnuppk(Request $request)
    {
      $nuppk = new NilaiKarakter;
      $nuppk->nuppk = $request->nuppk;
      $nuppk->save();

      return redirect('nuppk')->with('sukses', 'data Telah Dimasukan');
    }

    public function deletenuppk($id)
    {
      $nuppk = NilaiKarakter::find($id);
      $nuppk->delete($nuppk);

      return redirect('nuppk')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatsem()
    {
      $index = Semester::all()->sortByDesc("id");
      return view('semester.index', compact('index'));
    }

    public function inputsem(Request $request)
    {
      $sem = new Semester;
      $sem->semester = $request->semester;
      $sem->tahunpelajaran = $request->tahunpelajaran;
      $sem->save();

      return redirect('semester')->with('sukses', 'data Telah Dimasukan');
    }

    public function deletesem($id)
    {
      $sem = Semester::find($id);
      $sem->delete($sem);

      return redirect('semester')->with('sukses', 'data Telah Di Hapus');
    }

    public function bro()
    {
      return view('masterklien.master');
    }

    public function lihatkom()
    {
      $index = Kompeahli::all();
      return view('kompe.index', compact('index'));
    }

    public function inputkom(Request $request)
    {
      $kom = new Kompeahli;
      $kom->nama_kom = $request->nama_kom;
      $kom->save();

      return redirect('kom')->with('sukses', 'data Telah Dimasukan');
    }

    public function deletekom($id)
    {
      $kom = Kompeahli::find($id);
      $kom->delete($kom);

      return redirect('kom')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatruang()
    {
      $lruang = Ruangan::all();
      return view('ruangan.ruang', compact('lruang'));
    }

    public function tambahruang(Request $request)
    {
        $ruang = Ruangan::create($request->all());
        return redirect('ruanglihat')->with('sukses', 'data Telah Dimasukan');
    }

    public function editruang($id)
	  {
      $ruang = Ruangan::find($id);

	    return view('ruangan.edit', compact('ruang'));
    }

    public function updateruang(Request $request, $id)
    {
        $ruang = Ruangan::find($id);
        $ruang->update($request->all());
        return redirect('ruanglihat')->with('sukses', 'data Telah update');
    }

    public function deleteruang($id)
    {
      $ruang = Ruangan::find($id);
      $ruang->delete($ruang);

      return redirect('ruanglihat')->with('sukses', 'data Telah Di Hapus');
    }

}
