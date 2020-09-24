<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PernyataanTeman extends Model
{
    protected $table = 'pernyataanteman';
    protected $primaryKey = 'id';

    public function penilaianteman()
    {
      return $this->hasMany('App\PenilaianTeman');
    } 
}
