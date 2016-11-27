<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_points', function (Blueprint $table) {
            // 基本カラム定義
            $table->integer ( 'user_id' )->unsigned ()->comment ( 'ユーザID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'point' )->comment ( 'ポイント' )->default ( 0 );
            $table->timestamps ();
            
            // FK
            $table->foreign('user_id')->references('user_id')->on('t_users')->onDelete('cascade');
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
            
            // PK
            $table->primary ( [ 
                            'user_id',
                            'shop_id' 
            ] );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_points');
    }
}
