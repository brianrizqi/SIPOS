<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPregnantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pregnants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mother_id')->unsigned();
            $table->foreign('mother_id')->references('id')->on('mother_pregnants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('pregnancy_to');
            $table->tinyInteger('status')->default(0)->comment('0 pregnant; 1 born');
            $table->timestamp('hpht');
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
        Schema::dropIfExists('detail_pregnants');
    }
}
