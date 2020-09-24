<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['nama_mapel','jp'];
    protected $primaryKey = 'id';

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
      return $this->hasMany('App\ListSkorKinerja');
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
