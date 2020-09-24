<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaiantemanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaianteman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('pernyataanteman_id')->nullable($value = true);
            $table->string('pilihan')->nullable($value = true);
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
        Schema::dropIfExists('penilaianteman');
    }
}
