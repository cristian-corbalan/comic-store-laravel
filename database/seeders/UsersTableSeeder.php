<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Cristian',
                'last_name' => 'Corbalan',
                'email' => 'ccris@gmail.com',
                'password' => Hash::make('asdasd'),
                'profile_img_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Lucien',
                'last_name' => 'Tillman',
                'email' => '7kadir@p-response.com',
                'password' => Hash::make('asdasd'),
                'profile_img_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Louann',
                'last_name' => 'Schiller',
                'email' => '1tajinder@plussmail.com',
                'password' => Hash::make('asdasd'),
                'profile_img_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gennie',
                'last_name' => 'Blick',
                'email' => 'dwarwaldaljeets@gmailvn.net',
                'password' => Hash::make('asdasd'),
                'profile_img_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
