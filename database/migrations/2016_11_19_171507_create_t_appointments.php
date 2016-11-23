<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTAppointments extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create ( 't_appointments', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'appointment_id' )->comment ( '指名ID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->string ( 'appointment_type', 1 )->comment ( '指名区分' );
            $table->integer ( 'order_no' )->nullable ()->comment ( '表示順' );
            $table->string ( 'display_name', 10 )->comment ( '表示名' );
            $table->smallInteger ( 'price' )->comment ( '料金' );
            $table->timestamps ();
            
            // FK
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
        } );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop ( 't_appointments' );
    }
}
