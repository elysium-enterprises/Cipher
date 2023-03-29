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
        Schema::create('products.sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')->references('id')->on('products.stock');
            $table->string('track_and_trace_id')->nullable();
            $table->datetime('sold_at')->useCurrent();
            $table->string('api_id', false, false);
            $table->datetime('delivered_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.sales', function (Blueprint $table) {
            $table->dropForeign(['stock_id']);
        });

        Schema::dropIfExists('products.sales');
    }
};
