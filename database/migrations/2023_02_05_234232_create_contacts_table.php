<?php

use App\Rules\DifferentFrom;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('relationship_id');
            $table->dateTime('since')->useCurrent();
            // Cannot have 2 cascades: restrict recipient because sending to non existing member is not as bad as receiving from one
            $table->foreignId('author_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreignId('recipient_id')->references('id')->on('members');
            $table->string('message')->nullable();
            $table->boolean('accepted')->default('false');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('contacts')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
                $table->dropForeign(['recipient_id']);
            });
        }
        Schema::dropIfExists('contacts');
    }
};
