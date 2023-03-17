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
        Schema::create('administrator_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->refences('id')->on('members')->onDelete('cascade');

            $table->enum('permission', [
                'can_create_products',
                'can_manage_products',
                
                'can_create_blogposts',
                'can_manage_blogposts',
                'can_authorize_blogposts',

                'can_view_analytics',
                
                'can_manage_members',
                'can_manage_hives',

                'can_manage_administrators',

                'permission_override'
            ]);

            $table->unique(['member_id', 'permission']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrator_roles', function (Blueprint $table) {
            $table->dropForeign('administrator_roles_member_id_foreign');
        });

        Schema::dropIfExists('administrator_roles');
    }
};
