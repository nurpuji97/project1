<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListabsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listabsen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guru_id')->nullable($value = true);
            $table->integer('mapel_id')->nullable($value = true);
            $table->integer('semester_id')->nullable($value = true);
            $table->integer('kelas_id')->nullable($value = true);
            $table->integer('ruangan_id')->nullable($value = true);
            $table->string('hari')->nullable($value = true);
            $table->string('jam')->nullable($value = true);
            $table->string('tugas')->nullable($value = true);
            $table->integer('botugpend')->nullable($value = true);
            $table->integer('botugpelak')->nullable($value = true);
            $table->integer('botugkesim')->nullable($value = true);
            $table->integer('botugtamp')->nullable($value = true);
            $table->integer('botugbaca')->nullable($value = true);
            $table->integer('b_ter')->nullable($value = true);
            $table->integer('b_kem')->nullable($value = true);
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
        Schema::dropIfExists('listabsen');
    }
}
