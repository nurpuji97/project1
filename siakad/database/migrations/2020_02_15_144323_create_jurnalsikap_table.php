<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalsikapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnalsikap', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->nullable($value = true);
            $table->integer('siswa_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->string('catatan_perilaku')->nullable($value = true);
            $table->integer('nilaikarakter_id')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnalsikap');
    }
}
