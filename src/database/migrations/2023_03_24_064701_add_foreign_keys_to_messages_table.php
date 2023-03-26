<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // ここでroom_idカラムの削除を追加
            $table->dropColumn('room_id');

            // 外部キー制約の追加
            $table->unsignedBigInteger('from_user_id')->change();
            $table->unsignedBigInteger('to_user_id')->change();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign(['from_user_id']);
            $table->dropForeign(['to_user_id']);

            // ここでroom_idカラムの復元を追加
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            // カラム型を元に戻す
            $table->integer('from_user_id')->change();
            $table->integer('to_user_id')->change();
        });
    }
}