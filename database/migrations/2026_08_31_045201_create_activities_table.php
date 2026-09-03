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
        Schema::create('activities', function (Blueprint $table) {

            $table->id();

            // Informasi utama
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('category', 100)
                  ->nullable();

            $table->text('excerpt')
                  ->nullable();

            $table->longText('content');

            // Dokumentasi
            $table->string('thumbnail')
                  ->nullable();

            // Informasi kegiatan
            $table->date('activity_date')
                  ->nullable();

            $table->string('location')
                  ->nullable();

            // Status publikasi
            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->timestamp('published_at')
                  ->nullable();

            // Untuk kegiatan unggulan
            $table->boolean('is_featured')
                  ->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};