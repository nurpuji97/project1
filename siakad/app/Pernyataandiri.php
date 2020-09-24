<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pernyataandiri extends Model
{
    protected $table = 'pernyataandiri';
    protected $primaryKey = 'id';

    public function penilaiandiri()
    {
      return $this->hasMany('App\PenilaianDiri');
    } 
}
