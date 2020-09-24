<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = ['kode_ruangan','nama_ruangan'];
    protected $primaryKey = 'id';

    public function listabsen()
    {
      return $this->hasMany('App\Listabsen');
    }

    public function lemskokin()
    {
      return $this->hasMany('App\ListSkorKinerja');
    }
}
