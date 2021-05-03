<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskPregnantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_pregnants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('detail_id')->unsigned();
            $table->foreign('detail_id')->references('id')->on('detail_pregnants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->tinyInteger('trimester');
            $table->string('answer', 255)->nullable();
            $table->integer('score');
            $table->string('status');
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
        Schema::dropIfExists('risk_pregnants');
    }
}
