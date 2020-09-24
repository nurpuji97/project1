<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListujianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listujian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guru_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->dateTime('exam_datetime')->nullable($value = true);
            $table->dateTime('exam_end')->nullable($value = true);
            $table->integer('exam_duration')->nullable($value = true);
            $table->integer('total_question')->nullable($value = true);
            $table->string('jenis_ujian')->nullable($value = true);
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
        Schema::dropIfExists('listujian');
    }
}
