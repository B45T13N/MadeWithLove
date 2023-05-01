<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasketControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_get_user_basket_with_big_id_should_return_500(): void
    {
        $this->seed(DatabaseSeeder::class);

        $userId = PHP_INT_MAX;
        $response = $this->get("/api/basket/{$userId}");

        $response->assertStatus(500);
    }

    public function test_get_user_basket_with_id_1_should_return_a_json(): void
    {
        $this->seed(DatabaseSeeder::class);

        $userId = 11;
        $response = $this->get("/api/basket/{$userId}");

        $response->assertStatus(200);
        $response->assertJson([
            'data'=> [
                'id' => 1,
                'userId' => 11,
                'itemsAdded' => []
            ]
        ]);
    }

    public function test_add_item_to_user_basket_should_return_201(): void
    {
        $this->seed(DatabaseSeeder::class);

        $userId = 11;
        $response = $this->post("/api/basket/addItem", ['userId' => $userId, 'itemId'=> 1]);

        $response->assertStatus(201);
    }

    public function test_add_two_times_the_same_item_to_user_basket_should_return_204(): void
    {
        $this->seed(DatabaseSeeder::class);

        $userId = 11;
        $response = $this->post("/api/basket/addItem", ['userId' => $userId, 'itemId'=> 1]);
        $response = $this->post("/api/basket/addItem", ['userId' => $userId, 'itemId'=> 1]);

        $response->assertStatus(202);
    }
}
