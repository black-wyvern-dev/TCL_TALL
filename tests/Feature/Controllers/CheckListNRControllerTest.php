<?php

namespace Tests\Feature\Controllers;

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

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_check_list_n_rs()
    {
        $checkListNRs = CheckListNr::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('check-list-n-rs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_n_rs.index')
            ->assertViewHas('checkListNRs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_check_list_nr()
    {
        $response = $this->get(route('check-list-n-rs.create'));

        $response->assertOk()->assertViewIs('app.check_list_n_rs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_check_list_nr()
    {
        $data = CheckListNr::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('check-list-n-rs.store'), $data);

        unset($data['link']);

        $this->assertDatabaseHas('check_list_nrs', $data);

        $checkListNr = CheckListNr::latest('id')->first();

        $response->assertRedirect(route('check-list-n-rs.edit', $checkListNr));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_check_list_nr()
    {
        $checkListNr = CheckListNr::factory()->create();

        $response = $this->get(route('check-list-n-rs.show', $checkListNr));

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_n_rs.show')
            ->assertViewHas('checkListNr');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_check_list_nr()
    {
        $checkListNr = CheckListNr::factory()->create();

        $response = $this->get(route('check-list-n-rs.edit', $checkListNr));

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_n_rs.edit')
            ->assertViewHas('checkListNr');
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

        $response = $this->put(
            route('check-list-n-rs.update', $checkListNr),
            $data
        );

        unset($data['link']);

        $data['id'] = $checkListNr->id;

        $this->assertDatabaseHas('check_list_nrs', $data);

        $response->assertRedirect(route('check-list-n-rs.edit', $checkListNr));
    }

    /**
     * @test
     */
    public function it_deletes_the_check_list_nr()
    {
        $checkListNr = CheckListNr::factory()->create();

        $response = $this->delete(
            route('check-list-n-rs.destroy', $checkListNr)
        );

        $response->assertRedirect(route('check-list-n-rs.index'));

        $this->assertDeleted($checkListNr);
    }
}
