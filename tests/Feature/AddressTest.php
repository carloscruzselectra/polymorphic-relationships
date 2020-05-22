<?php

namespace Tests\Feature;

use App\Address;
use App\City;
use App\Company;
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
        /** @var Address $userAddress */
        $userAddress = factory(Address::class)->states('user')->create();

        /** @var Address $companyAddress */
        $companyAddress = factory(Address::class)->states('company')->create();

        $this->assertInstanceOf(Address::class, $userAddress);
        $this->assertInstanceOf(Address::class, $companyAddress);

        $this->assertInstanceOf(User::class, $userAddress->addressable);
        $this->assertInstanceOf(BelongsTo::class, $userAddress->addressable());

        $this->assertInstanceOf(Company::class, $companyAddress->addressable);
        $this->assertInstanceOf(BelongsTo::class, $companyAddress->addressable());
    }
}
