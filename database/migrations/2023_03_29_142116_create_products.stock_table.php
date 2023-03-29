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
        Schema::create('products.stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->references('variant_id')->on('products.variants');
            $table->foreignId('booked_by')->references('id')->on('members');

            $table->date('booked_at')->useCurrent();
            $table->integer('stock_when_booked', false, false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.stock', function (Blueprint $table) {
            $table->dropForeign(['variant_id']);
            $table->dropForeign(['booked_by']);
        });
        
        Schema::dropIfExists('products.stock');
    }
};
