<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Setting;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingControllerTest extends TestCase
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
    public function it_displays_index_view_with_settings()
    {
        $settings = Setting::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('settings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.settings.index')
            ->assertViewHas('settings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_setting()
    {
        $response = $this->get(route('settings.create'));

        $response->assertOk()->assertViewIs('app.settings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_setting()
    {
        $data = Setting::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('settings.store'), $data);

        $this->assertDatabaseHas('settings', $data);

        $setting = Setting::latest('id')->first();

        $response->assertRedirect(route('settings.edit', $setting));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_setting()
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('settings.show', $setting));

        $response
            ->assertOk()
            ->assertViewIs('app.settings.show')
            ->assertViewHas('setting');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_setting()
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('settings.edit', $setting));

        $response
            ->assertOk()
            ->assertViewIs('app.settings.edit')
            ->assertViewHas('setting');
    }

    /**
     * @test
     */
    public function it_updates_the_setting()
    {
        $setting = Setting::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'value' => $this->faker->text(255),
        ];

        $response = $this->put(route('settings.update', $setting), $data);

        $data['id'] = $setting->id;

        $this->assertDatabaseHas('settings', $data);

        $response->assertRedirect(route('settings.edit', $setting));
    }

    /**
     * @test
     */
    public function it_deletes_the_setting()
    {
        $setting = Setting::factory()->create();

        $response = $this->delete(route('settings.destroy', $setting));

        $response->assertRedirect(route('settings.index'));

        $this->assertDeleted($setting);
    }
}
