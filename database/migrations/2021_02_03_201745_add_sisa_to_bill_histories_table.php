<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSisaToBillHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_histories', function (Blueprint $table) {
            $table->bigInteger("sisa_spp")->after("sisa_hutang");
            $table->bigInteger("sisa_spm")->after("sisa_spp");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_histories', function (Blueprint $table) {
            //
        });
    }
}
