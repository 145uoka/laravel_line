<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTExtension extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_extension', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'extension_id' )->comment ( '延長ID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->smallInteger ( 'extension_minute' )->comment ( '延長時間' );
            $table->smallInteger ( 'prise' )->comment ( '料金' );
            $table->timestamps ();
            
            // FK
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
            
            // PK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_extension');
    }
}
