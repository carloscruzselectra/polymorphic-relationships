<?php

namespace Tests\Feature;

use App\City;
use App\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_company_has_relationships()
    {
        /** @var Company $company */
        $company = factory(Company::class)->create();

        $this->assertInstanceOf(Company::class, $company);

        $this->assertInstanceOf(Collection::class, $company->users);
        $this->assertInstanceOf(HasMany::class, $company->users());

        $this->assertInstanceOf(Collection::class, $company->posts);
        $this->assertInstanceOf(HasManyThrough::class, $company->posts());
    }
}
