<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AgeRatingType;
use App\Enums\TitleType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_original')->nullable();
            $table->string('cover_image')->nullable();
            $table->jsonb('avatar_images')->nullable();
            $table->date('release_date')->nullable();
            $table->integer('chapters')->nullable();
            $table->enum('title_type', [TitleType::ANIME, TitleType::MANGA, TitleType::RANOBE]);
            $table->jsonb('alternative_names')->nullable();
            $table->float('rating')->default(0);
            $table->float('rating_count')->default(0);
            $table->enum('age_rating', [AgeRatingType::NO, AgeRatingType::SIX_PLUS, AgeRatingType::TWELVE_PLUS, AgeRatingType::SIXTEEN_PLUS, AgeRatingType::EIGHTEEN_PLUS])->default(AgeRatingType::NO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles');
    }
};
