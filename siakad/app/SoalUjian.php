<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    protected $table = 'buatsoal';
    protected $fillable = ['list_ujian_id','question_number','soal_text','soal_gambar'];
    protected $primaryKey = 'id';

    public function lisujian()
    {
      return $this->belongsTo('App\ListUjian');
    }

    public function jawabujian()
    {
      return $this->hasMany('App\JawabUjian');
    } 

}
