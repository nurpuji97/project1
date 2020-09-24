<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReprakemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprakems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->integer('praktik_1')->nullable($value = true);
            $table->integer('praktik_2')->nullable($value = true);
            $table->integer('praktik_3')->nullable($value = true);
            $table->integer('praktik_4')->nullable($value = true);
            $table->integer('nilai_prak')->nullable($value = true);
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
        Schema::dropIfExists('reprakems');
    }
}
