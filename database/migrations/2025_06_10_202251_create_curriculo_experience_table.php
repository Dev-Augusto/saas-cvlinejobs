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
        Schema::create('curriculo_experiecie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculo_id')->constrained()->onDelete('cascade');
            $table->foreignId('experiecie_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculo_experiecie');
    }
};
