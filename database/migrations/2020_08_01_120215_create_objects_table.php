<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
	        $table->text('description');
	        $table->string('address');
	        $table->float('price');
	        $table->integer('views');
	        $table->integer('room_count');
	        $table->integer('floor');
	        $table->float('square_full');
	        $table->float('square_live');
	        $table->float('square_kitchen');
	        $table->string('type_id');
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
        Schema::dropIfExists('objects');
    }
}
