<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(ImagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(ComicsTableSeeder::class);
        $this->call(HistoryTableSeeder::class);
    }
}
