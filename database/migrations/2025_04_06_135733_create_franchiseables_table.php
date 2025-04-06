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
        Schema::create('franchiseables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->morphs('franchiseable'); // создаст столбцы franchiseable_id и franchiseable_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchiseables');
    }
};
