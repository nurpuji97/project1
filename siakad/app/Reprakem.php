<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reprakem extends Model
{
    protected $table = 'reprakems';
    protected $fillable = ['siswa_id','mapel_id','semester_id','kelas_id','praktik_1',
                          'praktik_2','praktik_3','praktik_4','nilai_prak'];
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
