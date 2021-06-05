<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
            [
                'id' => 1,
                'title' => 'BATMAN #631',
                'synopsis' => "debido a la guerra de bandas, varios grupos armados se han apoderado de una escuela llena de jóvenes inocentes, entre los que se encuentra Tim Drake. ¿Podrán Batman y sus aliados detener la situación antes que algún inocente caiga por el fuego cruzado?",
                'number_pages' => 32,
                'price' => 21100,
                'discount' => 0,
                'stock' => 10,
                'publication_date' => '2004-08-25',
                'cover_img_id' => 14,
                'brand_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Giant-Size Amazing Spider-Man: King\'s Ransom (2021) #1',
                'synopsis' => "¡Todo se reduce a esto! \n¡La búsqueda de Kingpin que viola todas las leyes naturales! \n¡La enemistad de años de Tombstone y Robbie Robertson! \n¡Randy Robertson y el amor eterno de Beetle!\n¡El plan de Boomerang!\n¡Todo el status que de Spider-Man!",
                'number_pages' => 44,
                'price' => 21100,
                'discount' => 0,
                'stock' => 42,
                'publication_date' => '2021-05-12',
                'cover_img_id' => 12,
                'brand_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Venom (2018) #29',
                'synopsis' => "¡CONTINÚA \"VENOM BEYOND\"! \n¡Eddie Brock y su hijo, Dylan, están atrapados en un mundo desconocido! Pero si hay algo en lo que Eddie es bueno, es en hacer amigos, ¿verdad?",
                'number_pages' => null,
                'price' => 19000,
                'discount' => 30,
                'stock' => 26,
                'publication_date' => '2020-10-21 ',
                'cover_img_id' => 13,
                'brand_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'Batman: Urban Legends #1',
                'synopsis' => "El escritor superestrella Chip Zdarsky ingresa al mundo de Ciudad Gótica con el célebre artista de Detective Comics y DC Future State: Robin Eternal, Eddy Barrows, para una historia de seis partes que narra la investigación de Red Hood sobre una nueva droga que se extiende por Gótica",
                'number_pages' => 64,
                'price' => 16503,
                'discount' => 40,
                'stock' => 11,
                'publication_date' => '2021-03-09 ',
                'cover_img_id' => 10,
                'brand_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'Non-Stop Spider-Man #3',
                'synopsis' => "Algo está ocurriendo con las mentes jóvenes más brillantes de la ciudad de Nueva York, y Spider-man se ha encontrado en medio de ello. Esta historia te mostrará un lado de Peter Parker que ni tú ni Peter creían que existiera. Y ninguno de los dos podrá soportarlo.",
                'number_pages' => 28,
                'price' => 37900,
                'discount' => 0,
                'stock' => 22,
                'publication_date' => '2021-06-02 ',
                'cover_img_id' => 11,
                'brand_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('comics_has_genres')->insert([
            [
                'id' => 1,
                'comic_id' => 1,
                'genre_id' => 3,
            ],
            [
                'id' => 2,
                'comic_id' => 1,
                'genre_id' => 5,
            ],
            [
                'id' => 3,
                'comic_id' => 1,
                'genre_id' => 15,
            ],
            [
                'id' => 4,
                'comic_id' => 2,
                'genre_id' => 1,
            ],
            [
                'id' => 5,
                'comic_id' => 2,
                'genre_id' => 5,
            ],
            [
                'id' => 6,
                'comic_id' => 3,
                'genre_id' => 3,
            ],
            [
                'id' => 7,
                'comic_id' => 3,
                'genre_id' => 5,
            ],
            [
                'id' => 8,
                'comic_id' => 3,
                'genre_id' => 13,
            ],
            [
                'id' => 9,
                'comic_id' => 4,
                'genre_id' => 15,
            ],
            [
                'id' => 10,
                'comic_id' => 4,
                'genre_id' => 5,
            ],
            [
                'id' => 11,
                'comic_id' => 5,
                'genre_id' => 5,
            ],
            [
                'id' => 12,
                'comic_id' => 5,
                'genre_id' => 3,
            ],
            [
                'id' => 13,
                'comic_id' => 5,
                'genre_id' => 1,
            ],
        ]);

        DB::table('comics_has_characters')->insert([
            [
                'id' => 1,
                'comic_id' => 1,
                'character_id' => 1,
            ],
            [
                'id' => 2,
                'comic_id' => 1,
                'character_id' => 2,
            ],
            [
                'id' => 3,
                'comic_id' => 1,
                'character_id' => 3,
            ],
            [
                'id' => 4,
                'comic_id' => 2,
                'character_id' => 4,
            ],
            [
                'id' => 5,
                'comic_id' => 2,
                'character_id' => 5,
            ],
            [
                'id' => 6,
                'comic_id' => 3,
                'character_id' => 6,
            ],
            [
                'id' => 7,
                'comic_id' => 4,
                'character_id' => 1,
            ],
            [
                'id' => 8,
                'comic_id' => 4,
                'character_id' => 3,
            ],
            [
                'id' => 9,
                'comic_id' => 5,
                'character_id' => 4,
            ],
        ]);

        DB::table('comics_has_authors')->insert([
            [
                'id' => 1,
                'comic_id' => 1,
                'author_id' => 1,
            ],
            [
                'id' => 2,
                'comic_id' => 2,
                'author_id' => 2,
            ],
            [
                'id' => 3,
                'comic_id' => 3,
                'author_id' => 3,
            ],
            [
                'id' => 4,
                'comic_id' => 4,
                'author_id' => 4,
            ],
            [
                'id' => 5,
                'comic_id' => 4,
                'author_id' => 5,
            ],
            [
                'id' => 6,
                'comic_id' => 5,
                'author_id' => 6,
            ],
        ]);

        DB::table('comics_has_artists')->insert([
            [
                'id' => 1,
                'comic_id' => 1,
                'artist_id' => 1,
            ],
            [
                'id' => 2,
                'comic_id' => 2,
                'artist_id' => 2,
            ],
            [
                'id' => 3,
                'comic_id' => 2,
                'artist_id' => 3,
            ],
            [
                'id' => 4,
                'comic_id' => 3,
                'artist_id' => 4,
            ],
            [
                'id' => 5,
                'comic_id' => 3,
                'artist_id' => 5,
            ],
            [
                'id' => 6,
                'comic_id' => 4,
                'artist_id' => 6,
            ],
            [
                'id' => 7,
                'comic_id' => 4,
                'artist_id' => 7,
            ],
            [
                'id' => 8,
                'comic_id' => 5,
                'artist_id' => 8,
            ],
        ]);
    }
}
