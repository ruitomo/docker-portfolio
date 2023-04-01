<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecruitIdToMatchingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matchings', function (Blueprint $table) {
            $table->unsignedBigInteger('recruit_id')->after('room_id');
            $table->foreign('recruit_id')->references('id')->on('recruits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('matchings', function (Blueprint $table) {
            $table->dropForeign(['recruit_id']);
            $table->dropColumn('recruit_id');
        });
    }
}