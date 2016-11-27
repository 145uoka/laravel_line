<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTPointHistories extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create ( 't_point_histories', function (Blueprint $table) {
            // 基本カラム定義
            $table->integer ( 'history_id' )->comment ( '履歴ID' );
            $table->integer ( 'user_id' )->nullable ()->unsigned ()->comment ( 'ユーザID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->timestamp ( 'add_datime' )->comment ( '付与日時' );
            $table->integer ( 'add_point' )->comment ( '付与ポイント' )->default ( 0 );
            $table->string ( 'reason', 30 )->nullable ()->comment ( '付与理由' );
            $table->timestamps ();
            
            // FK
            $table->foreign('user_id')->references('user_id')->on('t_users');
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
        } );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop ( 't_point_histories' );
    }
}
