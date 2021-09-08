<?php

namespace Tests\Unit;

use App\Models\Seller;
use Tests\TestCase;

class SellerTest extends TestCase
{
    /** @test */
    public function it_can_be_created()
    {
        $seller = Seller::factory()->make();

        $this->assertInstanceOf(Seller::class, $seller);
    }

    /** @test */
    public function it_can_get_full_name_attribte()
    {
        $seller = Seller::factory()->make([
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);

        $this->assertEquals("John Doe", $seller->full_name);
    }
}
