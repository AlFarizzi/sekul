<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_values', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("guru_id");
            $table->integer("class_id");
            $table->integer("mapel_id");
            $table->integer("tahun");
            $table->integer("nilai");
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
        Schema::dropIfExists('subject_values');
    }
}
