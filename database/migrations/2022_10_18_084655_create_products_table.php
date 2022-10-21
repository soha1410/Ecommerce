<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->string('img');
            $table->boolean('visibility');
            $table->boolean('is_in_top_list');
            $table->integer('priority');
            $table->integer('off');
            $table->integer('available_count');
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
        Schema::dropIfExists('products');
    }
}
