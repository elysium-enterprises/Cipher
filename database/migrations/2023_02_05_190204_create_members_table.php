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
        Schema::create('members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->boolean('is_suspended')->default('false');
            $table->dateTime('latest_ping')->useCurrent();

            // Login information
            $table->string('login_name')->unique();
            $table->string('password');
            $table->string('mfa_secret')->nullable();

            $table->string('public_key');
            $table->string('private_key');
            
            // Display information
            $table->string('display_name');
            $table->string('avatar')->nullable();
            $table->string('status')->nullable();
            $table->string('about_me')->nullable();
            $table->string('verified_since')->nullable();

            // Contact information
            $table->string('contact_seed')->unique();
            $table->string('contact_code')->nullable();
            
            // Personal information
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
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
            ]);
            $table->boolean('dark_mode')->default(true);

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
