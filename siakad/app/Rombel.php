<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombel';
    protected $fillable = ['siswa_id','kelas_id'];
    protected $primaryKey = 'id';

    public function siswa()
    {
      return $this->belongsTo('App\Siswa');
    }

    public function kelas()
    {
      return $this->belongsTo('App\Kelas');
    }

}
