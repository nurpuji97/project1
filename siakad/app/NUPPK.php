<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NUPPK extends Model
{
    protected $table = 'nilaikarakter';
    protected $primaryKey = 'id';

    public function jurnalsikap()
    {
      return $this->hasMany('App\JurnalSikap');
    }
}
