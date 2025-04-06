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
        Schema::create('artistables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained('people')->onDelete('cascade');
            $table->morphs('artistable'); // создаст столбцы artistable_id и artistable_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artistables');
    }
};
