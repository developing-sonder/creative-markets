<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\OnlineStore;

class OnlineStoreTest extends TestCase
{
    /** @test */
    public function it_can_be_created()
    {
        $onlineStore = OnlineStore::factory()->make();

        $this->assertInstanceOf(OnlineStore::class, $onlineStore);
    }
}
