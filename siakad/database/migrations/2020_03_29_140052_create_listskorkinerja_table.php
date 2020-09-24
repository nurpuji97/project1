<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListskorkinerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listskorkinerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guru_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->enum('model_skor',['praktik','proyek'])->nullable($value = true);
            $table->string('jenis_model_skor')->nullable($value = true);
            $table->integer('bobot_persiapan')->nullable($value = true);
            $table->integer('bobot_proses')->nullable($value = true);
            $table->integer('bobot_hasil')->nullable($value = true);
            $table->string('deskripsi')->nullable($value = true);
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
        Schema::dropIfExists('listskorkinerja');
    }
}
