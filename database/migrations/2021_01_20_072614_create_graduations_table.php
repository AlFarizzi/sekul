<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduations', function (Blueprint $table) {
            $table->id();
            $table->integer("nisn");
            $table->integer("nis");
            $table->string('nama');
            $table->string('role');
            $table->string('alamat');
            $table->string("tempat_lahir");
            $table->string('tanggal_lahir');
            $table->integer("tahun_masuk");
            $table->integer("tahun_tamat");
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
        Schema::dropIfExists('graduations');
    }
}
