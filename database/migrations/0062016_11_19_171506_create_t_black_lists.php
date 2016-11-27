<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTBlackLists extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create ( 't_black_lists', function (Blueprint $table) {
            // 基本カラム定義
            $table->integer ( 'black_list_id' )->comment ( 'ブラックリストID' );
            $table->integer ( 'shop_id' )->unsigned ()->comment ( '店舗ID' );
            $table->integer ( 'user_id' )->nullable ()->unsigned ()->comment ( 'ユーザID' );
            $table->string ( 'telephone', 15 )->nullable ()->comment ( '電話番号' );
            $table->string ( 'reason' )->nullable ()->comment ( '理由' );
            $table->timestamps ();
            
            // FK
            $table->foreign ( 'shop_id' )->references ( 'shop_id' )->on ( 't_shops' )->onDelete ( 'cascade' );
            $table->foreign('user_id')->references('user_id')->on('t_users')->onDelete('cascade');
        } );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop ( 't_black_lists' );
    }
}
