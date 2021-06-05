<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'id' => 1,
                'name' => 'Batman',
                'alias' => 'Bruce Wayne',
                'description' => 'En nombre de sus padres asesinados, Bruce Wayne libra la guerra eterna contra los criminales de Gotham City.\nInspirado por los murciélagos que infestaban la propiedad de su familia, y su miedo de toda la vida hacia ellos, asumió la identidad de Batman, el héroe que Gotham. Llamado a la acción por el resplandor de la Bat-Señal, un reflector utilizado por su aliado, el comisionado Jim Gordon del Departamento de Policía de Gotham City, Batman vela por su dominio como un protector vigilante. El es la venganza. El es la noche. El es Batman',
                'profile_img_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Batgirl',
                'alias' => 'Barbara Gordon',
                'description' => 'Las malas calles de Gotham City tienen una serie de ángeles de la guarda que las vigilan. Y una de las primeras, la joven que convirtió al dúo dinámico en la familia Batman, fue Batgirl. Barbara Gordon siempre ha existido entre dos mundos: su vida en casa como la única hija del comisionado de policía James Gordon y su vida de gárgolas como socia del Caballero de la Noche y miembro fundador de Birds of Prey. Aunque las dos mitades de su vida no siempre encajan, ella se mantiene fiel a las cosas en las que cree. Una hacker de nivel genio y una corredora de información, y una experta en artes marciales, Babs, como su tocaya, ha demostrado ser una feroz sobreviviente, y uno de los protectores más preciados de Gotham.',
                'profile_img_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Nightwing',
                'alias' => 'Richard Grayson',
                'description' => 'Dick Grayson es el hijo adoptivo de Bruce Wayne, el primer Robin, Nightwing y un miembro destacado de la Batfamily. \nCuando su familia de acróbatas de circo fue brutalmente asesinada, Dick Grayson fue acogido por el multimillonario y super héroe Bruce Wayne. Bruce compartió su vida secreta como Batman con el niño y finalmente lo convirtió en Robin.',
                'profile_img_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Spider-Man',
                'alias' => 'Peter Parker',
                'description' => 'Peter Parker, estudiante de secundaria y niño prodigio, se sumergió en su pasión por la ciencia para evitar las burlas y amenazas de sus compañeros de clase y tropezó con un mundo más allá de su imaginación. Mientras visitaba una exhibición pública de nuevos avances en la manipulación de la radiación y la genética, Parker sintió la picadura de una araña doméstica común expuesta a un rayo de partículas.\nEsto provocó que Peter pueda tener los superpoderes de una araña, y emplea de estos para defender a su vecindario de los malhechores que los ponen en peligro, nombrándose a sí mismo Spider-Man.',
                'profile_img_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Mayor Fisk',
                'alias' => 'Wilson Fisk',
                'description' => 'Wilson Fisk  fue una de las figuras más destacadas del crimen organizado en los Estados Unidos y un enemigo recurrente de Daredevil. Era el rey de los mafiosos, controlando el crimen organizado en la costa este con mano de hierro. Fisk actualmente se desempeña como alcalde de la ciudad de Nueva York.',
                'profile_img_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Eddie Brock',
                'alias' => 'Wilson Fisk',
                'description' => ' Edward "Eddie" Brock era un periodista deshonrado del Daily Globe que se unió a un simbionte misterioso y se convirtió en el super villano conocido como Venom para vengarse de su archienemigo Spider-Man. Sin embargo, con el tiempo, Venom pronto se convertiría en un antihéroe y, finalmente, en un "protector letal" de los inocentes. Eddie Brock se ha vinculado a otros simbiontes como Toxin y Anti-Venom, pero sin embargo, es el simbionte de Venom el que ha mantenido su identidad más común. Juntos, Eddie Brock y Venom hacen una combinación mortal y han servido como uno de los mayores enemigos de Spider-Man.',
                'profile_img_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
