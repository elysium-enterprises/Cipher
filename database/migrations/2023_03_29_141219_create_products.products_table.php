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
        Schema::create('products.products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('material');
            $table->string('fit');
            $table->string('based_on')->nullable();
            $table->string('ships_from');
            $table->foreign('ships_from')->references('country_code')->on('countries');
            $table->foreignId('category_id')->references('id')->on('products.categories');
            $table->foreignId('care_instructions_id')->references('id')->on('products.care_instructions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products.products', function (Blueprint $table) {
            $table->dropForeign(['ships_from']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['care_instructions_id']);
        });
        
        Schema::dropIfExists('products.products');
    }
};
