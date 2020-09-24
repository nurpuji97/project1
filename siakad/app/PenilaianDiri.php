<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaianDiri extends Model
{
    protected $table = 'penilaiandiri';
    protected $fillable = ['siswa_id','kelas_id','semester_id','pernyataandiri_id','pilihan'];
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

    public function pernyataandiri()
    {
      return $this->belongsTo('App\Pernyataandiri');
    }
}
