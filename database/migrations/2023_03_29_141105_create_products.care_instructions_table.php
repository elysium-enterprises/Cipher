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
        Schema::create('products.care_instructions', function (Blueprint $table) {
            $table->id();
            $table->enum('wash', [
                'yes',
                'synthetics',
                'delicate',
                'hand',
                'no',
                'dry_cleaning'
            ])->nullable();
            $table->enum('dry_cleaning', [
                'a',
                'f',
                'p',
                'no'
            ])->nullable();
            $table->enum('water_temperature', [
                'cold',
                'warm',
                'hot'
            ])->nullable();
            $table->enum('bleach', [
                'no',
                'non-chlorine',
                'yes'
            ])->nullable();
            $table->enum('tumble_drying', [
                'yes',
                'low',
                'high',
                'synthetics',
                'delicate',
                'no',
            ]);
            $table->enum('ironing', [
                '110',
                '150',
                '200',
                '110-nosteam',
                '150-nosteam',
                '200-nosteam',
                'no'
            ])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products.care_instructions');
    }
};
