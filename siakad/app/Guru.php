<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nip','npwp','nama_guru','user_id','avatar','jenis_kelamin','tempat_lahir','tanggal_lahir','agama',
    'status_pernikahan','status_pegawai','alamat','telp','gelar_pendidikan','lulusan_universitas'];
    protected $primaryKey = 'id';
    
    public function GetAvatar()
    {
      if(!$this->avatar){
        return asset('images/Untitled.jpg');
      }
      return asset('images/'.$this->avatar);
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function listujian()
    {
      return $this->hasMany('App\ListUjian');
    }

    public function skorkin()
    {
      return $this->hasMany('App\ListSkorKinerja');
    }

    public function listabsen()
    {
      return $this->hasMany('App\Listabsen');
    }
    

}
