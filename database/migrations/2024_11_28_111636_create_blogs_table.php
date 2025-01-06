<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('privacy');
            $table->text('meta_tags');
            $table->text('meta_description');
            $table->string('slug')->unique();
            $table->timestamp('published_at')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image_alt')->nullable();
            $table->boolean('featured_article')->default(false)->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
