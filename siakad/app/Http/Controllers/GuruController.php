<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;
use App\ListUjian;
use App\Mapel;
use App\Semester;
use App\SoalUjian;
use App\Buatjawab;
use App\Kelas;
use App\ListSkorKinerja;
use App\Ruangan;
use DB;

class GuruController extends Controller
{
    public function index()
    {
      $index = Guru::all();
      return view('guru.index', compact('index'));
    }

    public function cari(Request $request)
    {
      $cari = $request->cari;

      $index = DB::table('guru')
               ->where('nama_guru','like',"%".$cari."%")
               ->orWhere('nip','like',"%".$cari."%")
               ->orWhere('npwp','like',"%".$cari."%")
               ->paginate();
     
      if(!$index->isEmpty()){
        return view('guru.index', compact('index'));
      } else {
      return redirect('guru')->with('sukses', 'data tidak ada');
      }  
               
    
    }

    public function tambahguru(Request $request)
    {
      $validateData = $request->validate([
        'nip' => 'required|numeric',
        //'npwp' => 'required|numeric',
        'nama_guru' => 'required',
        'email' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        //'status_pernikahan' => 'required',
        //'status_pegawai' => 'required',
        //'lulusan_universitas' => 'required',
        //'alamat' => 'required',
        //'telp' => 'required',
        //'gelar_pendidikan' => 'required'
      ]); 

      $user = new user;
      $user->role = $request->role;
      $user->name = $request->nama_guru;
      $user->email = $request->email;
      $user->password = bcrypt('rahasia');
      $user->remember_token = str_random(60);
      $user->save(); 

      $request->request->add(['user_id' => $user->id]);

      $guru = Guru::create($request->all());
      if($request->hasFile('avatar')){ //memasukan avatar kedalam file image
				$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
				$guru->avatar = $request->file('avatar')->getClientOriginalName();
				$guru->save();
			}
      return redirect('guru')->with('sukses', 'data Telah Dimasukan');
    }

    public function editguru($id)
    {
      $guru = Guru::find($id);
      return view('guru.edit', compact('guru'));
    }

    public function updateguru(Request $request, $id)
    {

      $guru = Guru::find($id);
      $guru->update($request->all());
      if($request->hasFile('avatar')){ //memasukan avatar kedalam file image
				$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
				$guru->avatar = $request->file('avatar')->getClientOriginalName();
				$guru->save();
			}

      return redirect('guru')->with('sukses', 'data Telah Di Update');
    }

    public function deleteguru($id)
    {
      $guru = Guru::find($id);
      $guru->delete($guru);

      return redirect('guru')->with('sukses', 'data Telah Di Hapus');
    }

    public function listkemguru()
    {
      $index = ListSkorKinerja::all();
      $guru = Guru::all();
      $kelas = Kelas::all();
      $mapel = Mapel::all();
      $sem = Semester::all()->sortByDesc("id");
      $guru2 = auth()->user()->guru;  
      $ruang = Ruangan::all();

      return view('guru.listkem', compact('index','sem','kelas','guru','mapel','guru2','ruang'));
    }


}
