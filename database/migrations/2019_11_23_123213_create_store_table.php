<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('type')->default('bechakena');
            $table->longText('description');
            $table->longText('price')->nullable();
            $table->longText('contact');
            $table->longText('author')->nullable();
            $table->longText('thumbnail');
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
        Schema::dropIfExists('store');
    }
}
