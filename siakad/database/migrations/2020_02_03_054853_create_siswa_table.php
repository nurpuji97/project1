<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis',13)->nullable($value = true);
            $table->string('nisn',12)->nullable($value = true);
            $table->string('nama')->nullable($value = true);
            $table->integer('user_id')->nullable($value = true);
            $table->string('avatar')->nullable($value = true);
            $table->string('jeniskelamin',10)->nullable($value = true);
            $table->string('tempatlahir')->nullable($value = true);
            $table->date('tanggallahir')->nullable($value = true);
            $table->string('agama')->nullable($value = true);
            $table->string('statuskeluarga')->nullable($value = true);
            $table->string('anakke')->nullable($value = true);
            $table->text('alamat')->nullable($value = true);
            $table->string('telprumah')->nullable($value = true);
            $table->string('sekolahasal')->nullable($value = true);
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
        Schema::dropIfExists('siswa');
    }
}
