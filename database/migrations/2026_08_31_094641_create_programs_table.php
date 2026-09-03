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
        Schema::create('programs', function (Blueprint $table) {

            $table->id();

            // Identitas program
            $table->string('name');

            $table->string('slug')
                ->unique();

            // Konten utama
            $table->string('title');

            $table->text('short_description')
                ->nullable();

            $table->longText('description')
                ->nullable();

            // Media
            $table->string('image')
                ->nullable();

            $table->string('icon', 100)
                ->nullable();

            // Tampilan
            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};