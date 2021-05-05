<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePregnantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_pregnants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mother_id')->unsigned();
            $table->foreign('mother_id')->references('id')->on('mother_pregnants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('pregnancy_to')->default(1);
            $table->double('lila');
            $table->double('bb');
            $table->string('gestational_age');
            $table->integer('trimester');
            $table->string('blood_booster_pills')->default(0);
            $table->string('immunization');
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
        Schema::dropIfExists('service_pregnants');
    }
}
