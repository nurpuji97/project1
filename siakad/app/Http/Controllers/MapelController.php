<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $index = Mapel::all();
        return view('mapel.index', compact('index'));
    }

    public function tambahmapel(Request $request)
    {
        $mapel = Mapel::create($request->all());
        return redirect('mapel')->with('sukses', 'data Telah Dimasukan');
    }

    public function editmapel($id)
    {
        $mapel = Mapel::find($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function updatemapel(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->update($request->all());
        return redirect('mapel')->with('sukses', 'data Telah update');
    }

    public function deletemapel($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete($mapel);
  
        return redirect('mapel')->with('sukses', 'data Telah Di Hapus');
    }
}
