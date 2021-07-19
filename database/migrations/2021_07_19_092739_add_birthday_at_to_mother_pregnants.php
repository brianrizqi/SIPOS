<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBirthdayAtToMotherPregnants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mother_pregnants', function (Blueprint $table) {
            $table->timestamp('birthday_at')->nullable()->after('phone');
            $table->dropColumn('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mother_pregnants', function (Blueprint $table) {
            $table->dropColumn('birthday_at');
            $table->string('age');
        });
    }
}
