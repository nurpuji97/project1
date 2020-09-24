<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['tingkat','kompeahli_id','rombel'];
    protected $primaryKey = 'id';

    
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
    
    public function kompeahli()
    {
      return $this->belongsTo('App\Kompeahli');
    }
    
    public function kompedasar()
    {
      return $this->hasMany('App\Kompedasar');
    }

    public function skorkin()
    {
      return $this->hasMany('App\ListSkorKinerja');
    }

    public function listuji()
    {
      return $this->hasMany('App\ListUjian');
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

}
