<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hire;
use App\Models\CheckListRigid;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HireCheckListRigidsControllerTest extends TestCase
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
    public function it_gets_hire_check_list_rigids()
    {
        $hire = Hire::factory()->create();
        $checkListRigids = CheckListRigid::factory()
            ->count(2)
            ->create([
                'hire_id' => $hire->id,
            ]);

        $response = $this->getJson(
            route('api.hires.check-list-rigids.index', $hire)
        );

        $response->assertOk()->assertSee($checkListRigids[0]->status_string);
    }

    /**
     * @test
     */
    public function it_stores_the_hire_check_list_rigids()
    {
        $hire = Hire::factory()->create();
        $data = CheckListRigid::factory()
            ->make([
                'hire_id' => $hire->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.hires.check-list-rigids.store', $hire),
            $data
        );

        unset($data['hire_id']);
        unset($data['link']);

        $this->assertDatabaseHas('check_list_rigids', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $checkListRigid = CheckListRigid::latest('id')->first();

        $this->assertEquals($hire->id, $checkListRigid->hire_id);
    }
}
