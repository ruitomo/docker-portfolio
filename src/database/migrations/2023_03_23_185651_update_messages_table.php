<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $foreignKeys = DB::select(
                "SELECT CONSTRAINT_NAME, COLUMN_NAME
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL",
                [config('database.connections.mysql.database'), 'messages']
            );

            $foreignKeys = collect($foreignKeys)->mapWithKeys(function ($item) {
                return [$item->COLUMN_NAME => $item->CONSTRAINT_NAME];
            });

            if ($foreignKeys->has('sender_id')) {
                $table->dropForeign([$foreignKeys['sender_id']]);
            }
            if ($foreignKeys->has('receiver_id')) {
                $table->dropForeign([$foreignKeys['receiver_id']]);
            }
            if ($foreignKeys->has('room_id')) {
                $table->dropForeign([$foreignKeys['room_id']]);
            }

            if (Schema::hasColumn('messages', 'sender_id')) {
                $table->unsignedBigInteger('from_user_id');
                $table->dropColumn('sender_id');
            }

            if (Schema::hasColumn('messages', 'receiver_id')) {
                $table->unsignedBigInteger('to_user_id');
                $table->dropColumn('receiver_id');
            }


            $table->unsignedBigInteger('from_user_id')->change();
            $table->unsignedBigInteger('to_user_id')->change();

            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->dropColumn('room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id')->after('to_user_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->dropForeign(['from_user_id']);
            $table->dropForeign(['to_user_id']);

            $table->renameColumn('from_user_id', 'sender_id');
            $table->renameColumn('to_user_id', 'receiver_id');

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}