<?php

namespace Tests\Feature;

use App\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_country_has_relationships()
    {
        /** @var Country $country */
        $country = factory(Country::class)->create();

        $this->assertInstanceOf(Country::class, $country);

        $this->assertInstanceOf(Collection::class, $country->cities);
        $this->assertInstanceOf(HasMany::class, $country->cities());

        $this->assertInstanceOf(Collection::class, $country->users);
        $this->assertInstanceOf(HasManyThrough::class, $country->users());

        $this->assertInstanceOf(Collection::class, $country->posts);
        $this->assertInstanceOf(HasManyDeep::class, $country->posts());

        $this->assertInstanceOf(Collection::class, $country->comments);
        $this->assertInstanceOf(HasManyDeep::class, $country->comments());
    }
}
