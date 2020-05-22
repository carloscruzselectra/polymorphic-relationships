<?php

namespace Tests\Feature;

use App\Address;
use App\City;
use App\Company;
use App\Country;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Znck\Eloquent\Relations\BelongsToThrough;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_relationships()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $this->assertInstanceOf(User::class, $user);

        $this->assertInstanceOf(Country::class, $user->country);
        $this->assertInstanceOf(BelongsToThrough::class, $user->country());

        $this->assertInstanceOf(City::class, $user->city);
        $this->assertInstanceOf(BelongsTo::class, $user->city());

        $this->assertInstanceOf(Company::class, $user->company);
        $this->assertInstanceOf(BelongsTo::class, $user->company());

        $user->address()->create([
            'street' => '124 st.',
            'street_number' => 1,
            'city_id' => factory(City::class)->create()->id,
            'zip' => '28999'
        ]);

        $this->assertInstanceOf(Address::class, $user->address);
        $this->assertInstanceOf(MorphOne::class, $user->address());

        $this->assertInstanceOf(Collection::class, $user->posts);
        $this->assertInstanceOf(HasMany::class, $user->posts());

        $this->assertInstanceOf(Collection::class, $user->comments);
        $this->assertInstanceOf(HasMany::class, $user->comments());
    }
}
