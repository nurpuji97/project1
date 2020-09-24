<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaianTeman extends Model
{
    protected $table = 'penilaianteman';
    protected $fillable = ['siswa_id','kelas_id','semester_id','pernyataanteman_id','pilihan'];
    protected $primaryKey = 'id';

    public function siswa()
    {
      return $this->belongsTo('App\Siswa');
    }

    public function Kelas()
    {
      return $this->belongsTo('App\Kelas');
    }

    public function semester()
    {
      return $this->belongsTo('App\Semester');
    }

    public function pernyataanteman()
    {
      return $this->belongsTo('App\PernyataanTeman');
    }
}
