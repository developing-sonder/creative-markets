<?php

namespace Tests\Feature;

use App\Models\OnlineStore;
use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewSellerApplicationTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function online_stores_are_upserted()
    {

    }


    /** @test */
    public function seller_can_be_created()
    {
        //-- SetUp
        $seller = Seller::factory()->raw();

        //-- Create a random online store so we are confident the attach only
        //-- attaches those passed through the request and not _all_ OnlineStores
        OnlineStore::create();

        //-- Execution
        $response = $this->post('/seller',
            [
                'seller' => $seller,
                'online_stores' => "{$this->faker->url()}, {$this->faker->url()}"
            ]
        );

        //--Assertions
        $response->assertStatus(200);

        $this->assertDatabaseHas('sellers', ['portfolio' => $seller['portfolio']]);
        $this->assertEquals(3, OnlineStore::count());
        $this->assertEquals(2, Seller::first()->onlineStores()->count());
    }
}
