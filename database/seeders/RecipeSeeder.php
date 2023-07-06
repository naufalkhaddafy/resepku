<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $recipes = [
            [
                'user_id' => 1,
                'title' => 'Tongseng Kambing',
                'description' => 'Ada ragam resep tongseng kambing yang bisa Moms simak, mulai dari resep tongseng kambing santan, tanpa santan, hingga resep tongseng kambing kering. Yuk, simak apa saja bahan yang dibutuhkan dan juga cara membuatnya!',
                'ingredient' => ["400 gr daging kambing tanpa lemak", "800 ml santan encer dari \u00bd butir kelapa", "1 batang serai, ambil bagian putihnya, memarkan", "2 batang daun bawang, potong 2 cm", "1 buah tomat merah, potong-potong", "4 sdm minyak, untuk menumis"],
                'step' => ["1. Masukkan daging kambing dan 2 lembar daun salam, rebus hingga daging matang dan empuk.", "2. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan.", "3. Tumis bawang merah, cabe rawit merah dan daging kambing hingga harum.", "4. Setelah kuah santan mendidih, tambahkan daun bawang dan tomat, masak hingga matang.", "5. Sambil dimasukkan air larutan asam jawa, buncis dan tomat, aduk rata dan lakukan koreksi rasa.", "6. Angkat dan sajikan resep tongseng kambing santan selagi hangat.", "7. Masak hingga daging empuk.", "8. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan"],
                'image' => '1Tongseng Kambing.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Sate Maranggi',
                'description' => 'Dalam resep sate maranggi khas Purwakarta, Jawa Barat ini biasanya menggunakan daging kambing atau sapi sebagai bahan dasarnya.        Proses marinasi dan pemasakan sebelum dibakar, membuat sate ini sudah enak meski disajikan tanpa saus pendamping. Yuk, coba buat sate maranggi dengan menyontek resep di bawah ini!',
                'ingredient' => ["300 gr daging sapi", "300 gr lemak sapi", "5 lembar daun pepaya", "Kecap manis"],
                'step' => ["1. Masukkan daging kambing dan 2 lembar daun salam, rebus hingga daging matang dan empuk.", "2. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan.", "3. Tumis bawang merah, cabe rawit merah dan daging kambing hingga harum.", "4. Setelah kuah santan mendidih, tambahkan daun bawang dan tomat, masak hingga matang.", "5. Sambil dimasukkan air larutan asam jawa, buncis dan tomat, aduk rata dan lakukan koreksi rasa.", "6. Angkat dan sajikan resep tongseng kambing santan selagi hangat.", "7. Masak hingga daging empuk.", "8. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan"],
                'image' => '1Sate Maranggi.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Kebab Turki',
                'description' => 'Dalam resep sate maranggi khas Purwakarta, Jawa Barat ini biasanya menggunakan daging kambing atau sapi sebagai bahan dasarnya.        Proses marinasi dan pemasakan sebelum dibakar, membuat sate ini sudah enak meski disajikan tanpa saus pendamping. Yuk, coba buat sate maranggi dengan menyontek resep di bawah ini!',
                'ingredient' => ["300 gr daging sapi", "300 gr lemak sapi", "5 lembar daun pepaya", "Kecap manis"],
                'step' => ["1. Masukkan daging kambing dan 2 lembar daun salam, rebus hingga daging matang dan empuk.", "2. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan.", "3. Tumis bawang merah, cabe rawit merah dan daging kambing hingga harum.", "4. Setelah kuah santan mendidih, tambahkan daun bawang dan tomat, masak hingga matang.", "5. Sambil dimasukkan air larutan asam jawa, buncis dan tomat, aduk rata dan lakukan koreksi rasa.", "6. Angkat dan sajikan resep tongseng kambing santan selagi hangat.", "7. Masak hingga daging empuk.", "8. Rebus santan, bumbu halus, daun salam, lengkuas dan serai sambil diaduk. Didihkan"],
                'image' => '1Kebab Turki.jpg',
            ]
        ];
        foreach ($recipes as $data) {
            Recipe::create($data);
        }
    }
}
