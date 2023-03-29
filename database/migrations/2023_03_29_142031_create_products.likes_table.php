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
        Schema::create('products.likes', function (Blueprint $table) {
            $table->foreignid('member_id')->references('id')->on('members');
            $table->foreignId('product_id')->references('id')->on('products.products')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['member_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product.likes', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('product.likes');
    }
};
