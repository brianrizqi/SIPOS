<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kspr_id')->unsigned();
            $table->foreign('kspr_id')->references('id')->on('kspr')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('risk_id')->unsigned();
            $table->foreign('risk_id')->references('id')->on('risk_pregnants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('risk_details');
    }
}
