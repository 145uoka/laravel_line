<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTReserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_reserve', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'reserve_id' )->comment ( '予約ID' );
            $table->integer ( 'user_id' )->nullable ()->unsigned ()->comment ( 'ユーザID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'staff_id' )->nullable ()->unsigned ()->comment ( 'スタッフID' );
            $table->date ( 'reserve_day' )->comment ( '予約日' );
            $table->date ( 'start_time' )->comment ( '開始時刻' );
            $table->date ( 'end_time' )->comment ( '終了時刻' );
            $table->smallInteger ( 'start_time_minute' )->comment ( '開始時刻分' );
            $table->smallInteger ( 'end_time_minute' )->comment ( '終了時刻分' );
            $table->integer ( 'course_id' )->nullable ()->unsigned ()->comment ( 'コースID' );
            $table->integer ( 'appointment_id' )->nullable ()->unsigned ()->comment ( '指名ID' );
            $table->boolean ( 'is_cansel' )->nullable ()->comment ( 'キャンセルフラグ' );
            $table->boolean ( 'is_coming' )->nullable ()->comment ( '来店フラグ' );
            $table->timestamps ();
            
            // FK
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
            $table->foreign ( 'staff_id' )->references ( 'staff_id' )->on ( 't_staffs');
            $table->foreign ( 'course_id' )->references ( 'course_id' )->on ( 't_courses' );
            $table->foreign ( 'appointment_id' )->references ( 'appointment_id' )->on ( 't_appointment' );
            
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
        Schema::drop('t_reserve');
    }
}
