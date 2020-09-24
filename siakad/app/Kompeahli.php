<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompeahli extends Model
{
    protected $table = 'kompeahli';
    protected $primaryKey = 'id';

    public function kelas()
    {
      return $this->hasMany('App\Kelas');
    }

    public function kompedasar()
    {
      return $this->hasMany('App\Kompedasar');
    }
}
