<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAccessTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_access_tokens', function (Blueprint $table) {
            // 基本カラム定義
            $table->string ( 'access_token', 64 )->comment ( 'アクセストークン' );
            $table->date ( 'expiration_date' )->comment ( '有効期限' );
            $table->integer('effective_period')->unsigned()->comment ( '有効期間');
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'user_id' )->unsigned ()->comment ( 'ユーザID' );
            $table->timestamps();
            
            // FK
            $table->foreign('shop_id')->references('shop_id')->on('t_shops')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('t_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_access_tokens');
    }
}
