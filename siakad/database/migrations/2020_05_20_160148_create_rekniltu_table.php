<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekniltuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekniltu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->integer('tug1')->nullable($value = true);
            $table->integer('tug2')->nullable($value = true);
            $table->integer('tug3')->nullable($value = true);
            $table->integer('tug4')->nullable($value = true);
            $table->integer('tug5')->nullable($value = true);
            $table->integer('tug6')->nullable($value = true);
            $table->integer('tug7')->nullable($value = true);
            $table->integer('tug8')->nullable($value = true);
            $table->integer('tug9')->nullable($value = true);
            $table->integer('tug10')->nullable($value = true);
            $table->integer('tug11')->nullable($value = true);
            $table->integer('tug12')->nullable($value = true);
            $table->integer('nilai_tugas')->nullable($value = true);
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
        Schema::dropIfExists('rekniltu');
    }
}
