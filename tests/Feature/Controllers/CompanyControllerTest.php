<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Company;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_companies()
    {
        $companies = Company::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('companies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.index')
            ->assertViewHas('companies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_company()
    {
        $response = $this->get(route('companies.create'));

        $response->assertOk()->assertViewIs('app.companies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_company()
    {
        $data = Company::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('companies.store'), $data);

        $this->assertDatabaseHas('companies', $data);

        $company = Company::latest('id')->first();

        $response->assertRedirect(route('companies.edit', $company));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_company()
    {
        $company = Company::factory()->create();

        $response = $this->get(route('companies.show', $company));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.show')
            ->assertViewHas('company');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_company()
    {
        $company = Company::factory()->create();

        $response = $this->get(route('companies.edit', $company));

        $response
            ->assertOk()
            ->assertViewIs('app.companies.edit')
            ->assertViewHas('company');
    }

    /**
     * @test
     */
    public function it_updates_the_company()
    {
        $company = Company::factory()->create();

        $data = [
            'company' => $this->faker->name,
            'address' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'contact' => $this->faker->text(255),
            'mobile' => $this->faker->phoneNumber,
        ];

        $response = $this->put(route('companies.update', $company), $data);

        $data['id'] = $company->id;

        $this->assertDatabaseHas('companies', $data);

        $response->assertRedirect(route('companies.edit', $company));
    }

    /**
     * @test
     */
    public function it_deletes_the_company()
    {
        $company = Company::factory()->create();

        $response = $this->delete(route('companies.destroy', $company));

        $response->assertRedirect(route('companies.index'));

        $this->assertDeleted($company);
    }
}
