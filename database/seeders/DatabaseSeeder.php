<?php

namespace Database\Seeders;

use CategorySeeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use App\Models\Category;
use function Pest\Laravel\call;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Movie::factory(50)->create();

        //Movie::factory(3)->create();
        User::factory(3)->create();
        //$this->call(CategorySeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(CategorySeeder::class);

        // DB::table('categories')->insert([
        //     [
        //         'category_name' => 'Action',
        //         'description'   => 'Film dengan adegan-adegan penuh aksi dan ketegangan.',
        //         'created_at'    => now(),
        //         'updated_at'    => now(),
        //     ],
        //     [
        //         'category_name' => 'Comedy',
        //         'description'   => 'Film yang bertujuan untuk menghibur dan mengundang tawa.',
        //         'created_at'    => now(),
        //         'updated_at'    => now(),
        //     ],
        //     [
        //         'category_name' => 'Drama',
        //         'description'   => 'Film yang berfokus pada pengembangan karakter dan konflik emosional.',
        //         'created_at'    => now(),
        //         'updated_at'    => now(),
        //     ],
        //     [
        //         'category_name' => 'Sci-Fi',
        //         'description'   => 'Film dengan latar belakang ilmiah dan teknologi futuristik.',
        //         'created_at'    => now(),
        //         'updated_at'    => now(),
        //     ],
        //     [
        //         'category_name' => 'Romance',
        //         'description'   => 'Film yang berpusat pada kisah cinta dan hubungan romantis.',
        //         'created_at'    => now(),
        //         'updated_at'    => now(),
        //     ],
        // ]);
    }
}
