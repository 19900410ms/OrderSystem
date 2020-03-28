<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->integer('status')->nullable();
            $table->bigInteger('user_id')->unsigned();
            // 外部キーの設定 onメソッドで主テーブルの設定
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
            $table->dropForeign('orders_menu_id_foreign');
        });
    }
}
