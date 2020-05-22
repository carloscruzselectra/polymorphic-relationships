<?php

namespace Tests\Feature;

use App\Address;
use App\City;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_address_has_relationships()
    {
        /** @var Address $address */
        $address = factory(Address::class)->create();

        $this->assertInstanceOf(Address::class, $address);

        $this->assertInstanceOf(User::class, $address->user);
        $this->assertInstanceOf(BelongsTo::class, $address->user());

        $this->assertInstanceOf(City::class, $address->city);
        $this->assertInstanceOf(BelongsTo::class, $address->city());
    }
}
