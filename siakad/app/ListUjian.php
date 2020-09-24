<?php

/*
* yang dikomentar yang akan dihapus
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListUjian extends Model
{
    protected $table = 'listujian';
    protected $fillable = ['guru_id','mapel_id','kelas_id','semester_id','ruangan_id','exam_datetime','exam_end','exam_duration','total_question','jenis_ujian'];
    protected $primaryKey = 'id';

    public function guru()
    {
      return $this->belongsTo('App\Guru');
    } 

    public function mapel()
    {
      return $this->belongsTo('App\Mapel');
    } 

    public function semester()
    {
      return $this->belongsTo('App\Semester');
    } 

    public function kelas()
    {
      return $this->belongsTo('App\Kelas');
    }

    public function soalujian()
    {
      return $this->hasMany('App\SoalUjian');
    }

    public function ruangan()
    {
      return $this->belongsTo('App\Ruangan');
    }

}
