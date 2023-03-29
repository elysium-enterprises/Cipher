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
        Schema::create('products.variants', function (Blueprint $table) {
            $table->id('variant_id');
            $table->foreignId('product_id')->references('id')->on('products.products');
            $table->string('size');
            $table->string('color');
            $table->integer('ean');
            $table->decimal('price_no_vat', 9, 3, true);
            $table->decimal('weight_grams', 10, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('products.variants');
    }
};
