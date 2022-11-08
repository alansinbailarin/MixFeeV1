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
            $table->longText('description')->nullable();
            $table->string('company')->nullable();
            $table->string('company_url')->nullable();
            $table->string('location')->nullable();
            $table->string('how_to_apply')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->enum('status', [1, 2])->default(1);
            $table->decimal('salary')->nullable();
            $table->longText('benefices')->nullable();
            $table->longText('requisites')->nullable();
            $table->longText('responsabilities')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('about')->nullable();
            $table->string('type')->nullable();

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
