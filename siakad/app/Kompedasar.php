<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompedasar extends Model
{
    protected $table = 'kompedas';
    protected $fillable = ['kode_komdas','nama_komdas'];
    protected $primaryKey = 'id';

}
