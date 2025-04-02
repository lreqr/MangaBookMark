<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Title;
use App\Models\Publisher;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('title_publishers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Title::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Publisher::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('title_publishers');
    }
};
