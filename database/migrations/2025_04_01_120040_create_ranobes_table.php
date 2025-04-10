<?php

use App\Enums\AgeRatingType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TranslationType;
use App\Enums\RanobeType;
use App\Enums\RanobeTitleStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ranobes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rus_name')->nullable();
            $table->string('eng_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('slug_url')->nullable();
            $table->jsonb('cover')->nullable();
            $table->string('release_date')->nullable();
            $table->jsonb('alternative_names')->nullable();
            $table->jsonb('rating')->nullable();
            $table->enum('age_rating', [AgeRatingType::NO, AgeRatingType::SIX_PLUS, AgeRatingType::TWELVE_PLUS, AgeRatingType::SIXTEEN_PLUS, AgeRatingType::EIGHTEEN_PLUS])->default(AgeRatingType::NO);
            $table->integer('chapters')->nullable();
            $table->jsonb('avatar_images')->nullable();
            $table->enum('type', [RanobeType::JAPAN, RanobeType::KOREA, RanobeType::CHINA, RanobeType::ENGLISH, RanobeType::AUTHORS, RanobeType::FANFIC])->nullable();
            $table->enum('title_status', [RanobeTitleStatus::ONGOING, RanobeTitleStatus::DONE, RanobeTitleStatus::ANNOUNCEMENT, RanobeTitleStatus::STOPPED, RanobeTitleStatus::DISCONTINUED])->nullable();
            $table->enum('translation_type', [TranslationType::DONE, TranslationType::ONGOING, TranslationType::NOT_STARTED])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranobes');
    }
};
