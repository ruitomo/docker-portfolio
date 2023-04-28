<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['receiver_id']);
            $table->dropForeign(['room_id']);

            $foreignKeys = collect($foreignKeys)->mapWithKeys(function ($item) {
                return [$item->COLUMN_NAME => $item->CONSTRAINT_NAME];
            });

            if ($foreignKeys->has('<from_user_id')) {
                $table->dropForeign([$foreignKeys['<from_user_id']]);
            }
            if ($foreignKeys->has('to_user_id')) {
                $table->dropForeign([$foreignKeys['to_user_id']]);
            }
            if ($foreignKeys->has('room_id')) {
                $table->dropForeign([$foreignKeys['room_id']]);
            }

            $table->renameColumn('<from_user_id', 'from_user_id');
            $table->renameColumn('to_user_id', 'to_user_id');

            $table->unsignedBigInteger('from_user_id')->change();
            $table->unsignedBigInteger('to_user_id')->change();

            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->dropColumn(['sender_id', 'receiver_id', 'room_id']);
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
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->dropColumn(['from_user_id', 'to_user_id']);
        });
    }
}