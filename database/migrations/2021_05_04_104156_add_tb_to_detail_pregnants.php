<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTbToDetailPregnants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pregnants', function (Blueprint $table) {
            $table->string('tb')->after('hpht')->default(0);
            $table->string('bb')->after('tb')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pregnants', function (Blueprint $table) {
            //
        });
    }
}
