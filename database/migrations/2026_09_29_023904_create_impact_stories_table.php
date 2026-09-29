<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('impact_stories', function (Blueprint $table) {
            $table->id();

            // Program/kategori cerita
            $table->string('category', 100);

            // Informasi utama cerita
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('beneficiary_name')->nullable();
            $table->string('subtitle')->nullable();

            // Konten
            $table->text('excerpt')->nullable();
            $table->longText('content');

            // Dokumentasi
            $table->string('image')->nullable();

            // Pengaturan tampilan
            $table->boolean('show_on_home')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
            $table->index('show_on_home');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('impact_stories');
    }
};