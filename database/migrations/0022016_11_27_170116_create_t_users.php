<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_users', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'user_id' )->comment ( 'ユーザーID' );
            $table->string ( 'hash_user_id', 64 )->comment ( 'HASHユーザID' );
            $table->string ( 'line_mid', 40 )->comment ( 'LINE MID' );
            $table->string ( 'role', 1 )->comment ( 'ロール' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_users');
    }
}
