<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hire;
use App\Models\Tanker;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TankerHiresControllerTest extends TestCase
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
    public function it_gets_tanker_hires()
    {
        $tanker = Tanker::factory()->create();
        $hires = Hire::factory()
            ->count(2)
            ->create([
                'tanker_id' => $tanker->id,
            ]);

        $response = $this->getJson(route('api.tankers.hires.index', $tanker));

        $response->assertOk()->assertSee($hires[0]->start_date);
    }

    /**
     * @test
     */
    public function it_stores_the_tanker_hires()
    {
        $tanker = Tanker::factory()->create();
        $data = Hire::factory()
            ->make([
                'tanker_id' => $tanker->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.tankers.hires.store', $tanker),
            $data
        );

        unset($data['link']);

        $this->assertDatabaseHas('hires', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $hire = Hire::latest('id')->first();

        $this->assertEquals($tanker->id, $hire->tanker_id);
    }
}
