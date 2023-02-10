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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('relationship_id');
            $table->dateTime('since')->useCurrent();
            $table->foreignUuid('author_id')->references('id')->on('members');
            $table->foreignUuid('recipient_id')->references('id')->on('members');
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
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('contacts_author_id_foreign');
            $table->dropForeign('contacts_recipient_id_foreign');
        });
        Schema::dropIfExists('contacts');
    }
};
