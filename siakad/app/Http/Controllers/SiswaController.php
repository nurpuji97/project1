<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\JurnalSikap;
use App\PenilaianDiri;
use App\Pernyataandiri;
use App\Kelas;
use App\Semester;
use App\PenilaianTeman;
use App\PernyataanTeman;
use App\Buatjawab;
use App\ListUjian;
use App\Mapel;
use App\Guru;
use App\SoalUjian;

class SiswaController extends Controller
{

    public function index()
    {
      $index = Siswa::all();
      return view('siswa.index', compact('index'));
    }

    public function tambahsiswa(Request $request)
    {
      $validateData = $request->validate([
        'nis' => 'required',
        //'nisn' => 'required|numeric',
        'nama' => 'required',
        'email' => 'required',
        'tempatlahir' => 'required',
        'agama' => 'required',
       // 'statuskeluarga' => 'required',
        //'anakke' => 'required',
        //'alamat' => 'required',
        //'telprumah' => 'required',
        //'sekolahasal' => 'required'
      ]);

      $user = new user;
      $user->role = 'siswa';
      $user->name = $request->nama;
      $user->email = $request->email;
      $user->password = bcrypt('rahasia');
      $user->remember_token = str_random(60);
      $user->save(); 

      $request->request->add(['user_id' => $user->id]);
      $siswa = siswa::create($request->all());
      if($request->hasFile('avatar')){ //memasukan avatar kedalam file image
				$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
				$siswa->avatar = $request->file('avatar')->getClientOriginalName();
				$siswa->save();
			}
      return redirect('siswa')->with('sukses', 'data Telah Dimasukan');
    }

    public function editsiswa($id)
		{
      $siswa = Siswa::find($id);
			return view('siswa.edit', compact('siswa','sd'));
    }
    
    public function updatesiswa(Request $request, $id)
    {

      $siswa = Siswa::find($id);
      $siswa->update($request->all());
      if($request->hasFile('avatar')){ //memasukan avatar kedalam file image
				$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
				$siswa->avatar = $request->file('avatar')->getClientOriginalName();
				$siswa->save();
			}

      return redirect('siswa')->with('sukses', 'data Telah Di Update');
    }

    public function deletesiswa($id)
    {
      $siswa = Siswa::find($id);
      $siswa->delete($siswa);

      return redirect('siswa')->with('sukses', 'data Telah Di Hapus');
    }

    public function lihatjurnalsiswa()
    {
      $siswa = auth()->user()->siswa;
      $jurnal = JurnalSikap::all();
      return view('siswa.jurnalsiswa', compact('siswa','jurnal'));
    }

    public function lihatpenilaiandiri()
    {
      $siswa = auth()->user()->siswa;
      $nilaidiri = Pernyataandiri::all();
      $kelas = Kelas::all();
      $semester = Semester::all();
      $lpdiri = PenilaianDiri::all();

      return view('siswa.penilaiandiri', compact('siswa','nilaidiri','kelas','semester','lpdiri'));
    }

    public function addpenilaiansiswa(Request $request)
    {
      
      $validateData = $request->validate([
        'kelas_id' => 'required',
        'semester_id' => 'required',
        'pilihan' => 'required',
      ]);

      $lpdiria = PenilaianDiri::create($request->all());
      return redirect('nilaidirisiswa')->with('sukses', 'data Telah Dimasukan');

    }

    public function lihatpenilaianteman()
    {
      $siswa = auth()->user()->siswa;
      $siswa2 = Siswa::all();
      $nilaiteman = PernyataanTeman::all();
      $kelas = Kelas::all();
      $semester = Semester::all();
      $lpteman = PenilaianTeman::all();

      return view('siswa.penilaianteman', compact('siswa','nilaiteman','kelas','semester','lpteman','siswa2'));
    }

    public function addpenilaianteman(Request $request)
    {
      
      $validateData = $request->validate([
        'kelas_id' => 'required',
        'semester_id' => 'required',
        'pilihan' => 'required',
      ]);

      $lpteman = PenilaianTeman::create($request->all());
      return redirect('nilaitemansiswa')->with('sukses', 'data Telah Dimasukan');

    }
     
}
