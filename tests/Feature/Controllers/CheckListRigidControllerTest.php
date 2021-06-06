<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CheckListRigid;

use App\Models\Hire;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckListRigidControllerTest extends TestCase
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
    public function it_displays_index_view_with_check_list_rigids()
    {
        $checkListRigids = CheckListRigid::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('check-list-rigids.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_rigids.index')
            ->assertViewHas('checkListRigids');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_check_list_rigid()
    {
        $response = $this->get(route('check-list-rigids.create'));

        $response->assertOk()->assertViewIs('app.check_list_rigids.create');
    }

    /**
     * @test
     */
    public function it_stores_the_check_list_rigid()
    {
        $data = CheckListRigid::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('check-list-rigids.store'), $data);

        unset($data['hire_id']);
        unset($data['link']);

        $this->assertDatabaseHas('check_list_rigids', $data);

        $checkListRigid = CheckListRigid::latest('id')->first();

        $response->assertRedirect(
            route('check-list-rigids.edit', $checkListRigid)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_check_list_rigid()
    {
        $checkListRigid = CheckListRigid::factory()->create();

        $response = $this->get(
            route('check-list-rigids.show', $checkListRigid)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_rigids.show')
            ->assertViewHas('checkListRigid');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_check_list_rigid()
    {
        $checkListRigid = CheckListRigid::factory()->create();

        $response = $this->get(
            route('check-list-rigids.edit', $checkListRigid)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.check_list_rigids.edit')
            ->assertViewHas('checkListRigid');
    }

    /**
     * @test
     */
    public function it_updates_the_check_list_rigid()
    {
        $checkListRigid = CheckListRigid::factory()->create();

        $hire = Hire::factory()->create();

        $data = [
            'checklist_type' => 'On',
            'status_string' => $this->faker->text(255),
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
            route('check-list-rigids.update', $checkListRigid),
            $data
        );

        unset($data['hire_id']);
        unset($data['link']);

        $data['id'] = $checkListRigid->id;

        $this->assertDatabaseHas('check_list_rigids', $data);

        $response->assertRedirect(
            route('check-list-rigids.edit', $checkListRigid)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_check_list_rigid()
    {
        $checkListRigid = CheckListRigid::factory()->create();

        $response = $this->delete(
            route('check-list-rigids.destroy', $checkListRigid)
        );

        $response->assertRedirect(route('check-list-rigids.index'));

        $this->assertDeleted($checkListRigid);
    }
}
