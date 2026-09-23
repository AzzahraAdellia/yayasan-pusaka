
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_visits', function (Blueprint $table) {
            $table->id();

            // Identitas acak untuk membedakan pengunjung.
            // Tidak menyimpan alamat IP mentah.
            $table->string('visitor_id', 64)->index();

            // Halaman publik yang dikunjungi.
            $table->string('path', 500)->index();

            // Informasi analitik.
            $table->string('country_code', 2)->nullable()->index();
            $table->string('country_name', 100)->nullable();
            $table->string('device_type', 20)->default('unknown')->index();

            $table->timestamps();

            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_visits');
    }
};