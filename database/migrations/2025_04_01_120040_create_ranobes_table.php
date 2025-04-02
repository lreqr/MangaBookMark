<?php

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
            $table->foreignId('adaptation_id')->constrained('titles')->onDelete('cascade');
            $table->enum('type', [RanobeType::JAPAN, RanobeType::KOREA, RanobeType::CHINA, RanobeType::ENGLISH, RanobeType::AUTHORS, RanobeType::FANFIC])->nullable();
            $table->enum('title_status', [RanobeTitleStatus::ONGOING, RanobeTitleStatus::DONE, RanobeTitleStatus::ANNOUNCEMENT, RanobeTitleStatus::STOPPED, RanobeTitleStatus::DISCONTINUED]);
            $table->enum('translation_type', [TranslationType::DONE, TranslationType::ONGOING, TranslationType::NOT_STARTED])->default(TranslationType::NOT_STARTED);
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
