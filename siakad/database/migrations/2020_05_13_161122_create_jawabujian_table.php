<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabujianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabujian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buat_soal_id')->nullable($value = true);
            $table->integer('is_correct')->nullable($value = true);
            $table->text('jawaban')->nullable($value = true);
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
        Schema::dropIfExists('jawabujian');
    }
}
