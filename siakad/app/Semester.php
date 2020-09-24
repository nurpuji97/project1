<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';
    protected $fillable = ['semester','tahunpelajaran'];
    protected $primaryKey = 'id';

    public function penilaiandiri()
    {
      return $this->hasMany('App\PenilaianDiri');
    }
    
    public function penilaianteman()
    {
      return $this->hasMany('App\PenilaianTeman');
    } 

    public function kompedasar()
    {
      return $this->hasMany('App\Kompedasar');
    }

    public function listujian()
    {
      return $this->hasMany('App\ListUjian');
    }

    public function skorkin()
    {
      return $this->hasMany('App\ListSkorKinerja','foreign_key');
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
