<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabUjian extends Model
{
    protected $table = 'jawabujian';
    protected $fillable = ['soal_ujian_id','is_correct','jawaban'];
    protected $primaryKey = 'id';

    public function soalujian()
    {
      return $this->belongsTo('App\SoalUjian');
    }
}
