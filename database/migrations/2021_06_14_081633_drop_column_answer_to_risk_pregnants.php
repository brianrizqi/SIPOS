<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnAnswerToRiskPregnants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('risk_pregnants', function (Blueprint $table) {
            $table->dropColumn('answer');
            $table->bigInteger('kader_id')->unsigned();
            $table->foreign('kader_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('risk_pregnants', function (Blueprint $table) {
            //
        });
    }
}
