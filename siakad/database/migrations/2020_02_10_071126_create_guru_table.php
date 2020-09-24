<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip',13)->nullable($value = true);
            $table->string('npwp')->nullable($value = true);
            $table->string('nama_guru')->nullable($value = true);
            $table->integer('user_id')->nullable($value = true);
            $table->string('avatar')->nullable($value = true);
            $table->string('jenis_kelamin',10)->nullable($value = true);
            $table->string('tempat_lahir')->nullable($value = true);
            $table->date('tanggal_lahir')->nullable($value = true);
            $table->string('agama')->nullable($value = true);
            $table->string('status_pernikahan')->nullable($value = true);
            $table->string('status_pegawai')->nullable($value = true);
            $table->string('gelar_pendidikan')->nullable($value = true);
            $table->string('lulusan_universitas')->nullable($value = true);
            $table->text('alamat')->nullable($value = true);
            $table->string('telp')->nullable($value = true);
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
        Schema::dropIfExists('guru');
    }
}
