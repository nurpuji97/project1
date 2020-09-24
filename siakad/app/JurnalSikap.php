<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalSikap extends Model
{
    protected $table = 'jurnalsikap';
    protected $fillable = ['tanggal','siswa_id','kelas_id','catatan_perilaku','nilaikarakter_id'];
    protected $primaryKey = 'id';

    public function siswa()
    {
      return $this->belongsTo('App\Siswa');
    }

    public function Kelas()
    {
      return $this->belongsTo('App\Kelas');
    }

    public function nilaikarakter()
    {
      return $this->belongsTo('App\NilaiKarakter');
    }
}
