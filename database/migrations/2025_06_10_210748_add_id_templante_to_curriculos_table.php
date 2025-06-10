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
        Schema::table('curriculos', function (Blueprint $table) {
            $table->integer("templante_number");
            $table->string("lang");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculos', function (Blueprint $table) {
            $table->dropColumn("templante_number");
            $table->dropColumn("lang");
        });
    }
};
