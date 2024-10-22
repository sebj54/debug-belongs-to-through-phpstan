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
        // Create table `countries` (id and name)
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        // Add relation to `users` table (a user belongs to a country)
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained();
        });

        // Create table `posts`
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        // Create table `comments`
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
        });

        Schema::dropIfExists('countries');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
    }
};
