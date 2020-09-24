<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompedasar;
use App\Mapel;
use App\Semester;
use App\Kompeahli;
use App\Kelas;

class KompedasarController extends Controller
{
    public function lihatkomdas()
    {
       $index = Kompedasar::all();
       
       return view('komdas.index', compact('index','mapel','semester','kelas','komahli'));
    }
    
    public function inputkomdas(Request $request)
    {
        $komdasar = Kompedasar::create($request->all());
        return redirect('komdas')->with('sukses', 'data Telah Dimasukan');
    }

    public function hapuskomdas($id)
    {
        $komdasar = Kompedasar::find($id);
        $komdasar->delete($komdasar);
  
        return redirect('komdas')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatsoal()
    {
        # code...
    }
}
