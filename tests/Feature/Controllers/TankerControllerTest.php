<?php

namespace Tests\Feature\Controllers;

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

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_tankers()
    {
        $tankers = Tanker::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tankers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tankers.index')
            ->assertViewHas('tankers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tanker()
    {
        $response = $this->get(route('tankers.create'));

        $response->assertOk()->assertViewIs('app.tankers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tanker()
    {
        $data = Tanker::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tankers.store'), $data);

        $this->assertDatabaseHas('tankers', $data);

        $tanker = Tanker::latest('id')->first();

        $response->assertRedirect(route('tankers.edit', $tanker));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tanker()
    {
        $tanker = Tanker::factory()->create();

        $response = $this->get(route('tankers.show', $tanker));

        $response
            ->assertOk()
            ->assertViewIs('app.tankers.show')
            ->assertViewHas('tanker');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tanker()
    {
        $tanker = Tanker::factory()->create();

        $response = $this->get(route('tankers.edit', $tanker));

        $response
            ->assertOk()
            ->assertViewIs('app.tankers.edit')
            ->assertViewHas('tanker');
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

        $response = $this->put(route('tankers.update', $tanker), $data);

        $data['id'] = $tanker->id;

        $this->assertDatabaseHas('tankers', $data);

        $response->assertRedirect(route('tankers.edit', $tanker));
    }

    /**
     * @test
     */
    public function it_deletes_the_tanker()
    {
        $tanker = Tanker::factory()->create();

        $response = $this->delete(route('tankers.destroy', $tanker));

        $response->assertRedirect(route('tankers.index'));

        $this->assertDeleted($tanker);
    }
}
