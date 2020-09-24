<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilairaportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilairaport', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->integer('b_ter')->nullable($value = true);
            $table->integer('b_kem')->nullable($value = true);
            $table->integer('nilai_tugas')->nullable($value = true);
            $table->integer('nilai_pts')->nullable($value = true);
            $table->integer('nilai_pas')->nullable($value = true);
            $table->integer('jml_nilai_ter')->nullable($value = true);
            $table->integer('nilai_prak')->nullable($value = true);
            $table->integer('nilai_pro')->nullable($value = true);
            $table->integer('jml_nilai_kem')->nullable($value = true);
            $table->integer('nilai_raport')->nullable($value = true);
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
        Schema::dropIfExists('nilairaport');
    }
}
