<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiRaport extends Model
{
    protected $table = 'nilairaport';
    protected $fillable = ['siswa_id','mapel_id','semester_id','kelas_id','b_ter',
                          'b_kem','nilai_tugas','nilai_pts','nilai_pas','jml_nilai_ter','nilai_prak',
                          'nilai_pro','jml_nilai_kem','nilai_raport'];
    protected $primaryKey = 'id';

    public function siswa()
    {
      return $this->belongsTo('App\Siswa');
    }

    public function mapel()
    {
      return $this->belongsTo('App\Mapel');
    }

    public function kelas()
    {
      return $this->belongsTo('App\Kelas');
    }

    public function semester()
    {
      return $this->belongsTo('App\Semester');
    }
}
