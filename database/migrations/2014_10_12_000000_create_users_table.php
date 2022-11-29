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
            $table->string('name');
            $table->string('ocupation')->nullable();
            $table->string('gender')->nullable();
            $table->longText('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('courses')->nullable();
            $table->string('knownments')->nullable();
            $table->string('languajes')->nullable();
            $table->string('skills')->nullable();
            $table->string('interests')->nullable();
            $table->string('ubication')->nullable();
            $table->text('biography')->nullable();
            $table->text('current_job')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('notification')->default(0);
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
