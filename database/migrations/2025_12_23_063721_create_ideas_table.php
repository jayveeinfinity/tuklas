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
        Schema::create('ideas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('ideas')
                  ->onDelete('set null');

            $table->unsignedInteger('version')->default(1);

            $table->string('title');
            $table->longText('background');
            $table->json('objectives');
            $table->json('scope');
            $table->json('limitations');

            $table->boolean('ai_assisted')->default(false);

            $table->timestamps();

            // Indexes for faster lookups
            $table->index(['parent_id']);
            $table->index(['user_id']);
            $table->fullText(['title', 'background']);
            $table->index(['parent_id', 'version']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
