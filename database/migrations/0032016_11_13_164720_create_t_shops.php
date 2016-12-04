<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_shops', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'shop_id' )->comment ( '店舗ID' );
            $table->string('hash_shop_id', 32)->unique()->comment ( 'HASH店舗ID');
            $table->string ( 'shop_name', 30 )->comment ( '店舗名' );
            $table->string ( 'telephone', 15 )->comment ( '電話番号' );
            $table->string ( 'address', 100 )->comment ( '住所' );
            $table->string ( 'open_time', 4 )->nullable ()->comment ( '開店時間' );
            $table->string ( 'close_time', 4 )->nullable ()->comment ( '閉店時間' );
            $table->string ( 'reserve_start_time', 4 )->nullable ()->comment ( '予約受付開始時間' );
            $table->string ( 'reserve_end_time', 4 )->nullable ()->comment ( '予約受付終了時間' );
            $table->smallInteger ( 'reserve_start_time_minute' )->nullable ()->comment ( '予約受付開始時刻分' );
            $table->smallInteger ( 'reserve_end_time_minute' )->nullable ()->comment ( '予約受付終了時間分' );
            $table->smallInteger ( 'resere_availabe_before_day' )->nullable ()->comment ( '予約受付可能営業日前' );
            $table->string('is_parking', 1)->nullable()->comment ( '駐車場有無');
            $table->text ( 'introduction' )->nullable ()->comment ( '説明文' );
            $table->integer ( 'area_id' )->nullable ()->unsigned ()->comment ( 'エリアID' );
            $table->timestamps ();

            // FK
            $table->foreign('area_id')->references('area_id')->on('m_areas')->onDelete('cascade');
            
            // PK
            
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_shops');
    }
}
