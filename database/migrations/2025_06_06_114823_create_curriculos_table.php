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
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("document")->nullable();
            $table->date("born");
            $table->string("gender");
            $table->string("email")->nullable();
            $table->string("address");
            $table->string("telephone");
            $table->string("profitional_profile");
            $table->string("grade");
            $table->string("course")->nullable();
            $table->string("institute");
            $table->string("year_start");
            $table->string("year_end");
            $table->string("image");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculos');
    }
};
