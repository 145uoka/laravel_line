<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_areas', function (Blueprint $table) {
            // 基本カラム定義
            $table->increments ( 'area_id' )->comment ( 'エリアID' );
            $table->string ( 'area_name', 30 )->comment ( 'エリア名' );
            $table->timestamps ();
            
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
        Schema::drop('m_areas');
    }
}
