<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hire;

use App\Models\Tanker;
use App\Models\Company;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HireControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_hires_list()
    {
        $hires = Hire::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hires.index'));

        $response->assertOk()->assertSee($hires[0]->start_date);
    }

    /**
     * @test
     */
    public function it_stores_the_hire()
    {
        $data = Hire::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hires.store'), $data);

        unset($data['link']);

        $this->assertDatabaseHas('hires', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_hire()
    {
        $hire = Hire::factory()->create();

        $company = Company::factory()->create();
        $tanker = Tanker::factory()->create();

        $data = [
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'delivery_date' => $this->faker->date,
            'hire_type' => 'Daily',
            'hire_rate' => $this->faker->randomNumber(2),
            'deposit' => $this->faker->randomNumber(2),
            'minimum_hire_period' => $this->faker->text(255),
            'notice_period' => $this->faker->text(255),
            'maintenance_included' => $this->faker->boolean,
            'tyres_included' => $this->faker->boolean,
            'delivery_charge' => $this->faker->randomNumber(2),
            'collection_charge' => $this->faker->randomNumber(2),
            'water_fill_charge' => $this->faker->randomNumber(2),
            'tyre_wear_charge' => $this->faker->randomNumber(2),
            'commissioning_charge' => $this->faker->randomNumber(2),
            'cleaning_outside_charge' => $this->faker->randomNumber(2),
            'cleanout_charge' => $this->faker->randomNumber(2),
            'other_charge' => $this->faker->randomNumber(2),
            'charge_notes' => $this->faker->text(255),
            'delivery_address' => $this->faker->text(255),
            'delivery_postcode' => $this->faker->text(255),
            'delivery_phone' => $this->faker->text(255),
            'delivery_email' => $this->faker->text(255),
            'delivery_fax' => $this->faker->text(255),
            'delivery_contact_name' => $this->faker->text(255),
            'insurer' => $this->faker->text(255),
            'policy_num' => $this->faker->text(255),
            'broker' => $this->faker->text(255),
            'policy_type' => $this->faker->text(255),
            'policy_expiry' => $this->faker->date,
            'policy_value' => $this->faker->randomNumber(2),
            'policy_notes' => $this->faker->text(255),
            'hirer_name' => $this->faker->text(255),
            'hirer_position' => $this->faker->text(255),
            'hirer_signature' => $this->faker->text(255),
            'hirer_sign_date' => $this->faker->date,
            'hirer_ip' => $this->faker->text(255),
            'hirer_geo' => $this->faker->text(255),
            'tcl_name' => $this->faker->text(255),
            'tcl_position' => $this->faker->text(255),
            'tcl_signature' => $this->faker->text(255),
            'tcl_sign_date' => $this->faker->date,
            'link' => $this->faker->text(255),
            'company_id' => $company->id,
            'tanker_id' => $tanker->id,
        ];

        $response = $this->putJson(route('api.hires.update', $hire), $data);

        unset($data['link']);

        $data['id'] = $hire->id;

        $this->assertDatabaseHas('hires', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hire()
    {
        $hire = Hire::factory()->create();

        $response = $this->deleteJson(route('api.hires.destroy', $hire));

        $this->assertDeleted($hire);

        $response->assertNoContent();
    }
}
