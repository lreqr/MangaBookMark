<?php

use App\Models\Title;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Franchise;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('title_franchises', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Title::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Franchise::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('title_franchises');
    }
};
