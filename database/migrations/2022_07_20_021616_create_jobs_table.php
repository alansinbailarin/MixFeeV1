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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('company');
            $table->string('company_url');
            $table->string('location');
            $table->string('how_to_apply');
            $table->string('company_email');
            $table->string('company_phone');
            $table->enum('status', [1, 2])->default(1);
            $table->decimal('salary')->nullable();
            $table->string('benefices')->nullable();
            $table->string('requisites')->nullable();
            $table->string('responsabilities')->nullable();
            $table->string('requirements')->nullable();
            $table->text('about');
            $table->time('post_time');
            $table->string('type');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories') ->onDelete('cascade');

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
        Schema::dropIfExists('jobs');
    }
};
