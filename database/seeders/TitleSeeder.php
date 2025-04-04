<?php

namespace Database\Seeders;

use App\Enums\AgeRatingType;
use App\Enums\RanobeTitleStatus;
use App\Enums\RanobeType;
use App\Enums\TitleType;
use App\Enums\TranslationType;
use App\Models\Franchise;
use App\Models\People;
use App\Models\Publisher;
use App\Models\Ranobe;
use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rifujin = People::create([
            'names' => ['Rifujin na Magonote', '理不尽な孫の手'],
            'description' => 'Это имя-псевдоним. В буквальном переводе это означает "нелепый задник". Твитер: https://twitter.com/Magote_rihujin'
        ]);

        $shirotaka = People::create([
            'names' => ['Shirotaka'],
            'description' => 'Иллюстратор серии.'
        ]);

        $franchise = Franchise::create([
            'names' => json_encode([
                'Mushoku Tensei: Isekai Ittara Honki Dasu',
                'Реинкарнация безработного: История о приключениях в другом мире',
                '無職転生 ～異世界行ったら本気だす',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $publisher_1 = Publisher::create([
            'names' => [
                'Seven Seas Entertainment',
                'Ghost Ship',
                'gomanga',
                'Seven Sea',
                'Seven Seas',
                'Seven Seas Ghost Ship',
                'Shinobi 7',
                'Waves of Color',
            ],
            'description' => 'Website: https://sevenseasentertainment.com'
        ]);

        $publisher_2 = Publisher::create([
            'names' => [
                'Kadokawa Shoten',
                'KADOKAWAタテスクコミック',
                'Kadokawa Tatesc Comic',
                'Kadokawa Vertical Comic',
                'ComicWalker',
                'Kadokawa Corporation',
                'KADOKAWA',
                'Book Walker',
            ],
        ]);

        $publisher_3 = Publisher::create([
            'names' => [
                'Media Factory',
            ],
        ]);

        $title = Title::create([
            'title' => 'Реинкарнация безработного (Новелла)',
            'title_original' => 'Mushoku Tensei~ Isekai Ittara Honki Dasu (LN)',
            'cover_image' => 'https://static1.dualshockersimages.com/wordpress/wp-content/uploads/2023/05/mushoku-tensei-best-characters.jpg',
            'avatar_images' => json_encode([
                'https://static.wikia.nocookie.net/mushokutensei/images/6/68/LN_Vol_1_JP.jpg/revision/latest?cb=20190329164806',
                'https://m.media-amazon.com/images/I/91NOfyJbXJL.jpg',
                'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1646949383i/60588209.jpg',
            ]),
            'release_date' => now(),
            'chapters' => 369,
            'alternative_names' => json_encode([
                'Mushoku Tensei (LN)',
                '無職転生 (LN)',
                '無職転生~ 異世界行ったら本気だす~ (LN)',
                'Jobless Reincarnation~ It will be All Out if I Go to Another World~ (LN)',
            ]),
            'rating' => 9.42,
            'rating_count' => 2.535,
            'age_rating' => AgeRatingType::SIXTEEN_PLUS,
        ]);

        $ranobe = Ranobe::create([
            'type' => RanobeType::JAPAN,
            'title_id' => $title->id,
            'title_status' => RanobeTitleStatus::DONE,
            'translation_type' => TranslationType::ONGOING,
            //Привязвываем к ранобе главный тайтл
        ]);

        // Привязываем автора
        $title->authors()->attach($rifujin->id);

        // Привязываем художника
        $title->artists()->attach($shirotaka->id);

        //Привязываем франшизу
        $title->franchises()->attach($franchise->id);

        //Привязываем издателей
        $title->publishers()->attach($publisher_1->id);
        $title->publishers()->attach($publisher_2->id);
        $title->publishers()->attach($publisher_3->id);

    }
}
