<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase; // Only if the application modifies the database.

    /** @test */
    public function it_can_retrieve_products_for_a_store()
    {
        $response = $this->get('/api/stores/1/products');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'product_id', 'name', 'prices', 'inventory_level',
                'variations', 'weight',
            ],
        ]);
    }

    /** @test */
    public function it_returns_a_404_if_store_not_found()
    {
        $response = $this->get('/api/stores/999/products');

        $response->assertStatus(404);
    }
}