<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMLineChannels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_line_channels', function (Blueprint $table) {
            // 基本カラム定義
            $table->string ( 'channel_id', 20 )->comment ( 'Channel ID' );
            $table->string ( 'channel_secret', 32 )->unique ()->comment ( 'Channel Secret' );
            $table->string ( 'channel_access_token', 200 )->comment ( 'Channel Access Token' );
            $table->integer ( 'shop_id' )->nullable ()->comment ( '店舗ID' );
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
        Schema::drop('m_line_channels');
    }
}
