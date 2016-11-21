<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 't_staffs', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'staff_id' )->comment ( 'スタッフID' );
            $table->integer ( 'shop_id' )->comment ( '店舗ID' );
            $table->string ( 'name', 10 )->nullable ()->comment ( '名前' );
            $table->string('age', 10)->nullable()->comment ( '年齢');
            $table->text ( 'introduction' )->nullable ()->comment ( '紹介文' );
            $table->timestamps ();
            
            // FK
            $table->foreign('shop_id')->references('shop_id')->on('t_shops')->onDelete('cascade');
            
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
        Schema::drop('t_staffs');
    }
}
