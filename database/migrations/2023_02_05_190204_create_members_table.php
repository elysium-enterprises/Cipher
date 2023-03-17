<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('latest_ping')->useCurrent();
            $table->boolean('invisible')->default(false);
            
            // Login information
            $table->string('cid')->unique();
            $table->string('password');
            $table->string('mfa_secret')->nullable();

            $table->text('private_key');
            $table->text('public_key');

            $table->boolean('is_admin')->default(false);

            $table->string('remember_token', 100)->nullable();
            
            // Display information
            $table->string('display_name');
            $table->string('avatar_mime')->nullable();
            $table->string('status')->nullable();
            $table->string('about_me')->nullable();
            $table->string('verified_since')->nullable();

            // Contact information
            $table->string('contact_seed')->unique();
            $table->string('contact_code')->nullable();
            
            // Personal information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable(); 
            $table->boolean('completed_onboarding')->default(false);

            // Settings
            $table->boolean('login_notification')->default(false);
            $table->boolean('findable_by_mutual_contacts')->default(true);
            $table->enum('allow_requests_from', [
                'nobody',
                'mutual_contacts',
                'mutual_hive',
                'mutual_everything',
                'everyone'
            ])->default('mutual_everything');
            $table->boolean('dark_mode')->default(true);
            $table->boolean('developer_mode')->default(false);

            $table->boolean('is_suspended')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
