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

    protected function setUp(): void
    {
        parent::setUp();

        //-- SetUp
        $this->sellerArray = Seller::factory()
            ->has_online_stores()
            ->raw();
    }

    /** @test */
    public function online_stores_are_upserted()
    {
        //-- Set Up
        //-- Creating a store here that should be upserted, not created.
        $onlineStore = OnlineStore::factory()->create();

        //-- Execution
        $response = $this->postToSellerApplication([
            'seller' => $this->sellerArray,
            'online_stores' => "{$onlineStore->url},{$this->faker->url()}, {$this->faker->url()}"
        ]);

        //--Assertions
        $response->assertStatus(200);
        $this->assertEquals(3, OnlineStore::count());
    }


    /** @test */
    public function seller_can_be_created()
    {
        //-- Setup
        //-- Create a random online store so we are confident the attach only
        //-- attaches those passed through the request and not _all_ OnlineStores
        OnlineStore::factory()->create();

        //-- Execution
        $response = $this->postToSellerApplication([
            'seller' => $this->sellerArray,
            'online_stores' => "{$this->faker->url()}, {$this->faker->url()}"
        ]);

        //--Assertions
        $response->assertStatus(200);

        $this->assertDatabaseHas('sellers', ['portfolio_url' => $this->sellerArray['portfolio_url']]);
        $this->assertEquals(3, OnlineStore::count());
        $this->assertEquals(2, Seller::first()->onlineStores()->count());
    }

    protected function postToSellerApplication(array $data)
    {
        return $this->post('/seller', $data);
    }
}
