<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuatsoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buatsoal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_ujian_id')->nullable($value = true);
            $table->integer('question_number')->nullable($value = true);
            $table->text('soal_text')->nullable($value = true);
            $table->string('soal_gambar')->nullable($value = true);
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
        Schema::dropIfExists('buatsoal');
    }
}
