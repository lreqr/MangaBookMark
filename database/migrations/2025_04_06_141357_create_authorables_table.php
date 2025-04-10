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
        Schema::create('authorables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('people')->onDelete('cascade');
            $table->morphs('authorable'); // создаст столбцы authorable_id и authorable_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorables');
    }
};
