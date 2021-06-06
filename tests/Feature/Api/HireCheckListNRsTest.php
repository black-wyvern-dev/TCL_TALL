<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hire;
use App\Models\CheckListNr;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HireCheckListNRsControllerTest extends TestCase
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
    public function it_gets_hire_check_list_n_rs()
    {
        $hire = Hire::factory()->create();
        $checkListNRs = CheckListNr::factory()
            ->count(2)
            ->create([
                'hire_id' => $hire->id,
            ]);

        $response = $this->getJson(
            route('api.hires.check-list-n-rs.index', $hire)
        );

        $response->assertOk()->assertSee($checkListNRs[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_hire_check_list_n_rs()
    {
        $hire = Hire::factory()->create();
        $data = CheckListNr::factory()
            ->make([
                'hire_id' => $hire->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.hires.check-list-n-rs.store', $hire),
            $data
        );

        unset($data['link']);

        $this->assertDatabaseHas('check_list_nrs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $checkListNr = CheckListNr::latest('id')->first();

        $this->assertEquals($hire->id, $checkListNr->hire_id);
    }
}
