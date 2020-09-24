<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis','nisn','nama','user_id','avatar','jeniskelamin','tempatlahir','tanggallahir','agama',
    'statuskeluarga','anakke','alamat','telprumah','sekolahasal'];
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

    public function rombel()
    {
      return $this->hasMany('App\Rombel');
    }

    public function jurnalsikap()
    {
      return $this->hasMany('App\JurnalSikap');
    }

    public function penilaiandiri()
    {
      return $this->hasMany('App\PenilaianDiri');
    } 

    public function penilaianteman()
    {
      return $this->hasMany('App\PenilaianTeman');
    } 

    public function reprakem()
    {
      return $this->hasMany('App\Reprakem');
    }

    public function nilraport()
    {
      return $this->hasMany('App\NilaiRaport');
    }

    public function rekniltug()
    {
      return $this->hasMany('App\Rekniltu');
    }

    public function absen()
    {
      return $this->hasMany('App\Absensi');
    }


}
