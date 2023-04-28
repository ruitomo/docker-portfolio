<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->change();
            $table->date('birthday')->nullable()->change();
            $table->string('img_path')->nullable()->change();
            $table->text('residence')->nullable();
            $table->text('job')->nullable();
            $table->text('homesauna')->nullable();
            $table->text('aufguss')->nullable();
            $table->text('gosauna')->nullable();
            $table->text('saunahat')->nullable();
            $table->text('hobby')->nullable();
            $table->text('routine')->nullable();
            $table->text('introduction')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // residence, job, homesauna, aufguss, gosauna, saunahat, hobby, routine カラムを削除
            $table->dropColumn(['residence', 'job', 'homesauna', 'aufguss', 'gosauna', 'saunahat', 'hobby', 'routine']);

            $table->string('gender')->nullable(false)->change();
            $table->integer('birthday')->nullable(false)->change();
            $table->string('img_path')->nullable(false)->change();
            $table->text('introduction')->nullable(false)->change();
        });
    }
}