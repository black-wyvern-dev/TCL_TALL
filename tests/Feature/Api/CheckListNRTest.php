<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CheckListNr;

use App\Models\Hire;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckListNrControllerTest extends TestCase
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
    public function it_gets_check_list_n_rs_list()
    {
        $checkListNRs = CheckListNr::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.check-list-n-rs.index'));

        $response->assertOk()->assertSee($checkListNRs[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_check_list_nr()
    {
        $data = CheckListNr::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.check-list-n-rs.store'), $data);

        unset($data['link']);

        $this->assertDatabaseHas('check_list_nrs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_check_list_nr()
    {
        $checkListNr = CheckListNr::factory()->create();

        $hire = Hire::factory()->create();

        $data = [
            'checklist_type' => 'On',
            'status' => $this->faker->text(255),
            'cladding_panels' => $this->faker->boolean,
            'handrail_ladder' => $this->faker->boolean,
            'compartment_internal' => $this->faker->boolean,
            'side_guards' => $this->faker->boolean,
            'rear_bumper' => $this->faker->boolean,
            'wings_stays' => $this->faker->boolean,
            'lights' => $this->faker->boolean,
            'engine' => $this->faker->boolean,
            'vacuum_pump' => $this->faker->boolean,
            'dipstrick' => $this->faker->boolean,
            'valve_operation' => $this->faker->boolean,
            'fire_extinguisher' => $this->faker->boolean,
            'chassis' => $this->faker->boolean,
            'note_1' => $this->faker->text(255),
            'ns_1' => $this->faker->numberBetween(0, 999),
            'os_1' => $this->faker->numberBetween(0, 999),
            'note_2' => $this->faker->text(255),
            'ns_2' => $this->faker->numberBetween(0, 999),
            'os_2' => $this->faker->numberBetween(0, 999),
            'note_3' => $this->faker->text(255),
            'ns_3' => $this->faker->numberBetween(0, 999),
            'os_3' => $this->faker->numberBetween(0, 999),
            'ext_splat_right' => $this->faker->text(255),
            'ext_splat_left' => $this->faker->text(255),
            'ext_splat_rear' => $this->faker->text(255),
            'ext_splat_front' => $this->faker->text(255),
            'int_splat' => $this->faker->text(255),
            'int_video' => $this->faker->text(255),
            'ext_video' => $this->faker->text(255),
            'hirer_name' => $this->faker->text(255),
            'hirer_position' => $this->faker->text(255),
            'hirer_signature' => $this->faker->text(255),
            'hirer_sign_date' => $this->faker->dateTime,
            'tcl_name' => $this->faker->text(255),
            'tcl_position' => $this->faker->text(255),
            'tcl_signature' => $this->faker->text(255),
            'tcl_sign_date' => $this->faker->dateTime,
            'link' => $this->faker->text(255),
            'hire_id' => $hire->id,
        ];

        $response = $this->putJson(
            route('api.check-list-n-rs.update', $checkListNr),
            $data
        );

        unset($data['link']);

        $data['id'] = $checkListNr->id;

        $this->assertDatabaseHas('check_list_nrs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_check_list_nr()
    {
        $checkListNr = CheckListNr::factory()->create();

        $response = $this->deleteJson(
            route('api.check-list-n-rs.destroy', $checkListNr)
        );

        $this->assertDeleted($checkListNr);

        $response->assertNoContent();
    }
}
