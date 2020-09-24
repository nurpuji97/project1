<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['listabsen_id','siswa_id','per1'];
    protected $primaryKey = 'id';

    public function siswa()
    {
      return $this->belongsTo('App\Siswa');
    }

    public function listabsen()
    {
      return $this->belongsTo('App\Listabsen');
    }

}
