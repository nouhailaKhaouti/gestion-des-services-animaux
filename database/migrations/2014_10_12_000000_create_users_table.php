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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('age')->nullable();
            $table->string('work')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('about_you')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('usertype')->default(0);
            $table->string('address')->nullable();
            $table->string('role')->default('normale');
            $table->string('acces')->default('approved');
            $table->string('email')->unique();
            $table->integer('warning')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
