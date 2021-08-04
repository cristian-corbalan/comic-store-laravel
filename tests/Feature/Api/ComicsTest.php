<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComicsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->getJson('/api/comics');

        $response->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
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
            ]
        ]);
    }
}
