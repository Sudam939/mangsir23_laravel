<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image'); //255
            $table->longText('description'); //no limit
            $table->integer('views')->default(0);
            $table->longText('meta_words')->nullable();
            $table->longText('meta_description')->nullable();
            // $table->enum('status',['pending','approved','rejected'])->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('posts');
    }
};
