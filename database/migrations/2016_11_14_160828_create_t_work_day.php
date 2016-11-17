<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTWorkDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 't_work_day', function (Blueprint $table) {
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'staff_id' )->unsigned ()->comment ( 'スタッフID' );
            $table->date ( 'work_day' )->comment ( '出勤日' );
            $table->string ( 'start_plan_time', 4 )->nullable ()->comment ( '予定開始時刻' );
            $table->string ( 'end_plan_time', 4 )->nullable ()->comment ( '予定終了時刻' );
            $table->string ( 'last_plan_time', 4 )->nullable ()->comment ( '予定最終受付時刻' );
            $table->smallInteger ( 'start_plan_time_minute' )->nullable ()->comment ( '予定開始時刻分' );
            $table->smallInteger ( 'end_pran_time_minute' )->nullable ()->comment ( '予定終了時刻分' );
            $table->smallInteger ( 'last_pran_time_minute' )->nullable ()->comment ( '予定最終受付時刻分' );
            $table->string ( 'start_time' )->comment ( '実績開始時刻' );
            $table->string ( 'end_time' )->comment ( '実績終了時刻' );
            $table->smallInteger ( 'start_time_minute' )->nullable ()->comment ( '実績開始時刻分' );
            $table->smallInteger ( 'end_time_minute' )->nullable ()->comment ( '実績終了時刻分' );
            $table->timestamps ();
            
            // FK
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
            $table->foreign ( 'staff_id' )->references ( 'staff_id' )->on ( 't_staffs' );
            
            // PK
            $table->primary ( [ 
                            'shop_id',
                            'staff_id',
                            'work_day' 
            ] );
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_work_day');
    }
}
