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
        Schema::create('partners', function (Blueprint $table) {

            $table->id();

            // Identitas mitra
            $table->string('name');

            // Informasi tambahan
            $table->text('description')
                ->nullable();

            // Logo mitra
            $table->string('logo')
                ->nullable();

            // Website / link mitra
            $table->string('website')
                ->nullable();

            // Pengaturan tampilan
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
        Schema::dropIfExists('partners');
    }
};