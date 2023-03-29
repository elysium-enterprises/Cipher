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
        Schema::create('products.product_key_feature', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products.products');
            $table->foreignId('key_features_id')->references('id')->on('products.key_features');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.product_key_feature', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['key_features_id']);
        });

        Schema::dropIfExists('products.key_features');
    }
};
