<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_histories', function (Blueprint $table) {
            $table->id();
            $table->integer("tanggal");
            $table->string("bulan");
            $table->integer("tahun");
            $table->integer("user_id");
            $table->integer("officer_id");
            $table->bigInteger("spm")->default(0);
            $table->bigInteger("spp")->default(0);
            $table->bigInteger("total_bayar");
            $table->bigInteger("sisa_hutang");
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
        Schema::dropIfExists('bill_histories');
    }
}
