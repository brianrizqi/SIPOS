<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnMotherIdToServicePregnants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_pregnants', function (Blueprint $table) {
            $table->dropForeign(['mother_id']);
            $table->dropColumn('mother_id');
            $table->string('name')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_pregnants', function (Blueprint $table) {
            //
        });
    }
}
