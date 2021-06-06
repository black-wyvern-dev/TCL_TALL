<?php

namespace Tests\Feature\Controllers;

use App\Models\Log;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogControllerTest extends TestCase
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
    public function it_displays_index_view_with_logs()
    {
        $logs = Log::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('logs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.index')
            ->assertViewHas('logs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_log()
    {
        $response = $this->get(route('logs.create'));

        $response->assertOk()->assertViewIs('app.logs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_log()
    {
        $data = Log::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('logs.store'), $data);

        $this->assertDatabaseHas('logs', $data);

        $log = Log::latest('id')->first();

        $response->assertRedirect(route('logs.edit', $log));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_log()
    {
        $log = Log::factory()->create();

        $response = $this->get(route('logs.show', $log));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.show')
            ->assertViewHas('log');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_log()
    {
        $log = Log::factory()->create();

        $response = $this->get(route('logs.edit', $log));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.edit')
            ->assertViewHas('log');
    }

    /**
     * @test
     */
    public function it_updates_the_log()
    {
        $log = Log::factory()->create();

        $data = [];

        $response = $this->put(route('logs.update', $log), $data);

        $data['id'] = $log->id;

        $this->assertDatabaseHas('logs', $data);

        $response->assertRedirect(route('logs.edit', $log));
    }

    /**
     * @test
     */
    public function it_deletes_the_log()
    {
        $log = Log::factory()->create();

        $response = $this->delete(route('logs.destroy', $log));

        $response->assertRedirect(route('logs.index'));

        $this->assertDeleted($log);
    }
}
