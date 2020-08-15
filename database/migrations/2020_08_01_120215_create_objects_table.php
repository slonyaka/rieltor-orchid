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
	        $table->text('description')->nullable();
	        $table->text('image')->nullable();
	        $table->string('address')->nullable();
	        $table->float('price')->nullable();
	        $table->integer('views')->nullable();
	        $table->integer('room_count')->nullable();
	        $table->integer('floor')->nullable();
	        $table->float('square_full')->nullable();
	        $table->float('square_live')->nullable();
	        $table->float('square_kitchen')->nullable();
	        $table->string('street_view')->nullable();
	        $table->string('youtube_link')->nullable();
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
