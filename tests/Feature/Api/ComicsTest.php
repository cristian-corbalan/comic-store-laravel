<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ComicsTest extends TestCase
{
    use RefreshDatabase;


    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_api_comics_returns_all_the_comics_in_the_database_as_json()
    {
        $response = $this->getJson('/api/comics');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->comicStructure()
                ]
            ])
            ->assertJsonCount(5, 'data');
    }

    public function test_api_post_comics_creates_a_new_comic()
    {
        $response = $this
            ->withAuthAdmin()
            ->postJson('/api/comics/nuevo', $this->validComic());

        $response->assertStatus(200)
            ->assertJsonStructure([
                'code',
                'data' => [
                    'id',
                    'title',
                    'synopsis',
                    'number_pages',
                    'price',
                    'discount',
                    'stock',
                    'publication_date',
                    'cover_img_id',
                    'brand_id',
                    'created_at',
                    'updated_at',
                ]
            ])
            ->assertJsonFragment(['code' => 0])
            ->assertJsonFragment(['id' => 6]);
    }

    public function test_api_post_comics_validates_empty_fields()
    {
        $response = $this
            ->withAuthAdmin()
            ->postJson('/api/comics/nuevo', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'synopsis', 'price', 'publication_date', 'brand_id', 'cover', 'genres', 'characters', 'authors', 'artists']);
    }

    public function test_api_post_comics_validates_that_you_have_permission_to_create_comics()
    {
        $response = $this->postJson('/api/comics/nuevo', $this->validComic());

        $response->assertStatus(403);
    }

    public function test_api_delete_comics_deletes_the_requested_comic()
    {
        $response = $this
            ->withAuthAdmin()
            ->deleteJson('/api/comics/1/eliminar', ['id' => 1]);


        $response
            ->assertStatus(200)
            ->assertJsonFragment(['code' => 0]);
    }

    public function test_api_delete_comic_validates_that_you_have_permission_to_create_comics()
    {
        $response = $this->deleteJson('/api/comics/1/eliminar');

        $response->assertStatus(403);
    }

    public function test_api_delete_comic_doesnt_delete_a_not_existent_comic()
    {
        $response = $this
            ->withAuthAdmin()
            ->deleteJson('/api/comics/20/eliminar');

        $response->assertStatus(422)
            ->assertJsonValidationErrors('id');
    }

    public function test_api_put_comics_updates_the_requested_comic()
    {

        $response = $this
            ->withAuthAdmin()
            ->putJson('/api/comics/1/editar', $this->editedComic());

        $response->dump();

        /*
         * Testeamos que
         *
         * - Conexión exitosa
         * - Cambié los datos del comic seleccionado
         */
        $response
            ->assertStatus(200)
            ->assertJsonFragment(['code' => 0])
            ->assertJsonFragment(['title' => 'edited title'])
            ->assertJsonStructure(['data' => $this->comicStructure()]);
    }

    public function test_api_put_comics_validates_that_you_have_permission_to_edit_comics()
    {
        $requested = $this->putJson('/api/comics/1/editar', $this->editedComic());

        $requested->assertStatus(403);
    }

    public function test_api_put_comics_validates_empty_fields()
    {
        $requested = $this
            ->withAuthAdmin()
            ->putJson('/api/comics/1/editar', []);

        $requested
            ->assertStatus(422)
        ->assertJsonValidationErrors(['title', 'synopsis', 'price', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);
    }

    /**
     * Returns the authentication of a user with the administrator role.
     *
     * @return ComicsTest
     */
    protected function withAuthAdmin(): ComicsTest
    {
        $user = new User();
        $user->id = 1;

        return $this->actingAs($user);
    }

    /**
     * Returns the authentication of a user with the default role.
     *
     * @return ComicsTest
     */
    protected function withAuthDefault(): ComicsTest
    {
        $user = new User();
        $user->id = 3;

        return $this->actingAs($user);
    }

    /**
     * Returns an array with the valid data for the creation of a comic.
     *
     * @return array
     */
    protected function validComic(): array
    {
        return [
            'title' => 'Absolute Carnage vs. Deadpool #3',
            'synopsis' => 'ALL MY CODEX\'S LIVE IN TEXAS* By “Texas” we mean “Deadpool’s spine.” Sorry, we just could’t NOT do that pun. With his potent combination of codex\'s from different symbioses, the fate of the fight between good and evil lies within Deadpool! He’s…on the side of good, right? Honestly, sometimes it’s hard to tell. I mean, Spider-Man likes him, right? Kind of? That’s…something',
            'number_pages' => 28,
            'price' => 38637,
            'discount' => 0,
            'stock' => 10,
            'publication_date' => '2021-07-27',
            'brand_id' => 1,
            'genres' => [
                0 => 1,
            ],
            'characters' => [
                0 => 1,

            ],
            'authors' => [
                0 => 1,

            ],
            'artists' => [
                0 => 1,

            ],
            'cover' => UploadedFile::fake()->create('test.jpg'),
        ];
    }

    /**
     * Returns the structure of a Comic
     *
     * @return string[]
     */
    protected function comicStructure(): array
    {
        return [
            'id',
            'title',
            'synopsis',
            'number_pages',
            'price',
            'discount',
            'stock',
            'publication_date',
            'cover_img_id',
            'brand_id',
            'created_at',
            'updated_at',
        ];
    }

    protected function editedComic(): array
    {
        return [
            'title' => 'edited title',
            'synopsis' => 'Este es una gran descripción sobre un gran comic',
            'price' => 38637,
            'discount' => 0,
            'stock' => 10,
            'publication_date' => '2021-07-27',
            'brand_id' => 1,
            'genres' => [
                0 => 1,
            ],
            'characters' => [
                0 => 1,

            ],
            'authors' => [
                0 => 1,

            ],
            'artists' => [
                0 => 1,

            ],
        ];
    }
}
