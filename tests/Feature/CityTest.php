<?php

namespace Tests\Feature;

use App\City;
use App\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_city_has_relationships()
    {
        /** @var City $city */
        $city = factory(City::class)->create();

        $this->assertInstanceOf(City::class, $city);

        $this->assertInstanceOf(Country::class, $city->country);
        $this->assertInstanceOf(BelongsTo::class, $city->country());

        $this->assertInstanceOf(Collection::class, $city->users);
        $this->assertInstanceOf(HasMany::class, $city->users());

        $this->assertInstanceOf(Collection::class, $city->posts);
        $this->assertInstanceOf(HasManyThrough::class, $city->posts());
    }
}
