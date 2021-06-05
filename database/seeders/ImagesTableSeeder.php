<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'id' => 1,
                'src' => 'users/user.jpg',
                'alt' => 'Foto de perfil de usuario por defecto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'src' => 'comics/cover.jpg',
                'alt' => 'Foto de portada de comics por defecto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'src' => 'characters/character.jpg',
                'alt' => 'Foto de perfil de personajes por defecto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'src' => 'characters/batman.jpg',
                'alt' => 'Perfil del personaje Batman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'src' => 'characters/batgirl.jpg',
                'alt' => 'Perfil del personaje Batgirl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'src' => 'characters/nightwing.jpg',
                'alt' => 'Perfil del personaje Nightwing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'src' => 'characters/spider_man.jpg',
                'alt' => 'Perfil del personaje Spider-Man',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'src' => 'characters/mayor_fisk.jpg',
                'alt' => 'Perfil del personaje Mayor Fisk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'src' => 'characters/venom.jpg',
                'alt' => 'Perfil del personaje Venom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'src' => 'comics/batman_urban_legends_v1.jpg',
                'alt' => 'Batman a punto de entrar en una pelea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'src' => 'comics/non_stop_spider_man_v3.jpg',
                'alt' => 'Spider-man rodeado de enemigos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'src' => 'comics/giant_size_amazing_spider_man_kings_ransom_v1.jpg',
                'alt' => 'Spider-man balanceándose por la ciudad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'src' => 'comics/venom_2018_v29.jpg',
                'alt' => 'Venom siendo vencido por el enemigo y este atrapando a su hijo por el cuello',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'src' => 'comics/batman_v631.jpg',
                'alt' => 'El brazo de Batman escribiendo con tiza una escena del crimen en un pizarrón',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
