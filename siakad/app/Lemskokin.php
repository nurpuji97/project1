<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lemskokin extends Model
{
    protected $table = 'lemkokin';
    protected $fillable = ['list_skor_kinerja_id','komponen','sub_komponen','no'];
    protected $primaryKey = 'id';

    public function listskokin()
    {
      return $this->belongsTo('App\ListSkorKinerja');
    }
}
