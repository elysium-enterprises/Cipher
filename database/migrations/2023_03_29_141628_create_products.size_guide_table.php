<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products.size_guide', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products.products');
            $table->integer('sorting_order', false, true);

            $table->decimal('width');
            $table->decimal('height');
            $table->decimal('length')->nullable();

            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.size_guide', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('products.size_guide');
    }
};
