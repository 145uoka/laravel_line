<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_courses', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'course_id' )->comment ( 'コースID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'order_no' )->nullable ()->comment ( '表示順' );
            $table->string ( 'course_name', 10 )->comment ( 'コース名' );
            $table->string ( 'detail', 50 )->nullable ()->comment ( '内容' );
            $table->integer ( 'minute' )->comment ( '時間' );
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
        Schema::drop('t_courses');
    }
}
