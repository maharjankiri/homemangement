<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_name');
            $table->integer('price');
            $table->integer('tenant_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('rooms', function(Blueprint $table){
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
