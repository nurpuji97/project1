<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pernyataandiri;
use App\PenilaianDiri;
use App\Siswa;
use App\Kelas;
use App\Semester;
use App\PernyataanTeman;
use App\PenilaianTeman;

class PenilaianTemanController extends Controller
{
    public function lihatpernyataandiri()
    {
        $index = Pernyataandiri::all();
        return view('pernyataan.diri', compact('index'));
    }
    
    public function tambahpernyataandiri(Request $request)
    {
        $diri = new Pernyataandiri;
        $diri->pernyataan = $request->pernyataan;
        $diri->save();

        return redirect('diri')->with('sukses', 'data Telah Dimasukan');
    }

    public function hapuspernyataandiri($id)
    {
        $diri = Pernyataandiri::find($id);
        $diri->delete($diri);
  
        return redirect('diri')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatpenilaiandiri()
    {
        $lpdiri = PenilaianDiri::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $pd = Pernyataandiri::all();

        return view('manajemendata.penilaiandiri', compact('lpdiri','siswa','kelas','semester','pd'));
    }

    public function addpenilaiandiri(Request $request)
    {
        $lpdiria = PenilaianDiri::create($request->all());
        return redirect('penilaiandiri')->with('sukses', 'data Telah Dimasukan');
    }

    public function lihatpernyataanteman()
    {
        $index2 = PernyataanTeman::all();
        return view('pernyataan.teman', compact('index2'));
    }

    public function tambahpernyataanteman(Request $request)
    {
        $teman = new PernyataanTeman;
        $teman->pernyataan = $request->pernyataan;
        $teman->save();

        return redirect('teman')->with('sukses', 'data Telah Dimasukan');
    }

    public function hapuspernyataanteman($id)
    {
        $teman = PernyataanTeman::find($id);
        $teman->delete($teman);
  
        return redirect('teman')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatpenilaianteman()
    {
        $lpteman = PenilaianTeman::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $pds = PernyataanTeman::all();

        return view('manajemendata.penilaianteman', compact('lpteman','siswa','kelas','semester','pds'));
    }

    public function addpenilaianteman(Request $request)
    {
        $lpteman = PenilaianTeman::create($request->all());
        return redirect('penilaianteman')->with('sukses', 'data Telah Dimasukan');
    }
}
