<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'action' => 'Añadió el comic BATMAN #631',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'action' => 'Añadió el comic Giant-Size Amazing Spider-Man: King\'s Ransom (2021) #1',
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'action' => 'Añadió el comic Venom (2018) #29',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'action' => 'Añadió el comic Batman: Urban Legends #1',
            ],
            [
                'id' => 5,
                'user_id' => 4,
                'action' => 'Añadió el comic Non-Stop Spider-Man #3',
            ],
        ]);
    }
}
