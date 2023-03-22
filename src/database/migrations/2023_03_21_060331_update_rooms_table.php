<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // matching_dataカラムを削除
            $table->dropColumn('matching_data');

            // from_user_idとto_user_idをunsignedBigIntegerに変更
            $table->unsignedBigInteger('from_user_id')->change();
            $table->unsignedBigInteger('to_user_id')->change();

            // 外部キー制約を追加
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // 外部キー制約を削除
            $table->dropForeign(['from_user_id']);
            $table->dropForeign(['to_user_id']);

            // from_user_idとto_user_idをintegerに戻す
            $table->integer('from_user_id')->change();
            $table->integer('to_user_id')->change();

            // matching_dataカラムを追加
            $table->integer('matching_data');
        });
    }
}