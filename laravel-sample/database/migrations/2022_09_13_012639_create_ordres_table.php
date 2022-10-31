<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordres', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->biginteger('menu_id')->unsigned();
        $table->biginteger('user_id')->unsigned();
        $table->biginteger('situation');
        $table->biginteger('quantity');
        $table->timestamps();

        $table->foreign('menu_id')->references('id')->on('menus');
        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordres');
    }
}
