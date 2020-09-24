<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekniltu extends Model
{
    protected $table = 'rekniltu';
    protected $fillable = ['siswa_id','mapel_id','semester_id','kelas_id','tug1',
                          'tug2','tug3','tug4','tug5','tug6','tug7','tug8','tug9','tug10'
                          ,'tug11','tug12','nilai_tugas'];
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
