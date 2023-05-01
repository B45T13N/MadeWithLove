<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_item_controller_should_return_a_json(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/api/items');

        $response->assertStatus(200);
        $response->assertJson([
            "data"=>[]
        ]);
    }

    public function test_getHotDeals_item_controller_should_return_a_json(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/api/hotDeals');

        $response->assertStatus(200);
        $response->assertJson([
            "data"=>[]
        ]);
    }

    public function test_getItemById_when_id_1_item_controller_should_return_a_json(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/api/item/1');

        $response->assertStatus(200);
        $response->assertJson([
            "data"=>[]
        ]);
    }

    public function test_getItemById_when_id_BigInt_item_controller_should_return_404(): void
    {
        $this->seed(DatabaseSeeder::class);
        $itemId = PHP_INT_MAX;
        $response = $this->get("/api/item/{$itemId}");

        $response->assertStatus(404);
    }
}
