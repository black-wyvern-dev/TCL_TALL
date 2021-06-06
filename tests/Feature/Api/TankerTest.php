<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tanker;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TankerControllerTest extends TestCase
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
    public function it_gets_tankers_list()
    {
        $tankers = Tanker::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tankers.index'));

        $response->assertOk()->assertSee($tankers[0]->fleet_num);
    }

    /**
     * @test
     */
    public function it_stores_the_tanker()
    {
        $data = Tanker::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tankers.store'), $data);

        $this->assertDatabaseHas('tankers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tanker()
    {
        $tanker = Tanker::factory()->create();

        $data = [
            'fleet_num' => $this->faker->text(255),
            'make' => $this->faker->text(255),
            'equipment' => $this->faker->text(255),
            'replacement_value' => $this->faker->randomNumber(5),
            'mot_expiry' => $this->faker->date,
            'adr_expiry' => $this->faker->date,
            'chassis_num' => $this->faker->text(255),
            'discharge_pump' => $this->faker->boolean,
            'service_interval' => $this->faker->text(255),
            'serial_num' => $this->faker->text(255),
            'tank_type' => $this->faker->text(255),
            'sector' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.tankers.update', $tanker), $data);

        $data['id'] = $tanker->id;

        $this->assertDatabaseHas('tankers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tanker()
    {
        $tanker = Tanker::factory()->create();

        $response = $this->deleteJson(route('api.tankers.destroy', $tanker));

        $this->assertDeleted($tanker);

        $response->assertNoContent();
    }
}
