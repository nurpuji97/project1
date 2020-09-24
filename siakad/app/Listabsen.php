<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listabsen extends Model
{
    protected $table = 'listabsen';
    protected $fillable = ['guru_id','mapel_id','kelas_id','semester_id','ruangan_id','hari','jam','tugas','botugpend'
                          ,'botugpelak','botugkesim','botugkesim','botugtamp','botugbaca','b_ter','b_kem'];
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

    public function ruangan()
    {
      return $this->belongsTo('App\Ruangan');
    }

    public function absen()
    {
      return $this->hasMany('App\Absensi');
    }
}
