<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListSkorKinerja extends Model
{
    protected $table = 'listskorkinerja';
    protected $fillable = ['guru_id','mapel_id','semester_id','kelas_id','model_skor',
                          'jenis_model_skor','bobot_persiapan','bobot_proses','bobot_hasil','deskripsi'];
    protected $primaryKey = 'id';

    public function guru()
    {
      return $this->belongsTo('App\Guru');
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

    public function lemskokin()
    {
      return $this->hasMany('App\Lemskokin');
    } 

   /* public function ruangan()
    {
      return $this->belongsTo('App\Ruangan');
    } */

}
