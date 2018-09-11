<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('variety_id');
            $table->unsignedInteger('price_filter_id');
            $table->string('slug')->unique();
            $table->string('title', 100);
            $table->float('price');
            $table->text('body');
            $table->boolean('is_active')->default(true);
            $table->string('picture')->nullable();
            $table->timestamps();

            $table->foreign('variety_id')->references('id')->on('varieties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
