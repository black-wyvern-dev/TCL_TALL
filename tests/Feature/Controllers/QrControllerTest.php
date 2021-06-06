<?php

namespace Tests\Feature\Controllers;

use App\Models\Qr;
use App\Models\User;

use App\Models\Tanker;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QrControllerTest extends TestCase
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
    public function it_displays_index_view_with_qrs()
    {
        $qrs = Qr::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('qrs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.qrs.index')
            ->assertViewHas('qrs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_qr()
    {
        $response = $this->get(route('qrs.create'));

        $response->assertOk()->assertViewIs('app.qrs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_qr()
    {
        $data = Qr::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('qrs.store'), $data);

        $this->assertDatabaseHas('qrs', $data);

        $qr = Qr::latest('id')->first();

        $response->assertRedirect(route('qrs.edit', $qr));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_qr()
    {
        $qr = Qr::factory()->create();

        $response = $this->get(route('qrs.show', $qr));

        $response
            ->assertOk()
            ->assertViewIs('app.qrs.show')
            ->assertViewHas('qr');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_qr()
    {
        $qr = Qr::factory()->create();

        $response = $this->get(route('qrs.edit', $qr));

        $response
            ->assertOk()
            ->assertViewIs('app.qrs.edit')
            ->assertViewHas('qr');
    }

    /**
     * @test
     */
    public function it_updates_the_qr()
    {
        $qr = Qr::factory()->create();

        $tanker = Tanker::factory()->create();

        $data = [
            'label' => $this->faker->word,
            'tankers_id' => $tanker->id,
        ];

        $response = $this->put(route('qrs.update', $qr), $data);

        $data['id'] = $qr->id;

        $this->assertDatabaseHas('qrs', $data);

        $response->assertRedirect(route('qrs.edit', $qr));
    }

    /**
     * @test
     */
    public function it_deletes_the_qr()
    {
        $qr = Qr::factory()->create();

        $response = $this->delete(route('qrs.destroy', $qr));

        $response->assertRedirect(route('qrs.index'));

        $this->assertDeleted($qr);
    }
}
