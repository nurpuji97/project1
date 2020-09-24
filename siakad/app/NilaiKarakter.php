<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKarakter extends Model
{
    protected $table = 'nilaikarakter';
    protected $primaryKey = 'id';

    public function jurnalsikap()
    {
      return $this->hasMany('App\JurnalSikap');
    }
}
