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
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'mahasiswa_id' )->constrained( 'mahasiswas' );
            $table->foreignId( 'daftar_beasiswa_id' )->constrained('daftar_beasiswas');
            $table->integer( 'semester' );
            $table->string( 'berkas' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswas');
    }
};
