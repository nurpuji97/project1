<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemkokinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lemkokin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_skor_kinerja_id')->nullable($value = true);
            $table->string('komponen')->nullable($value = true);
            $table->string('sub_komponen')->nullable($value = true);
            $table->integer('no')->nullable($value = true);
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
        Schema::dropIfExists('lemkokin');
    }
}
