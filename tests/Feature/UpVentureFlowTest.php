<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Webinar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpVentureFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_loads_with_upventure_branding()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('UpVenture');
        $response->assertSee('Unlock New Ventures');
    }

    public function test_user_can_register_and_access_dashboard()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@upventure.id',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Welcome, Test User');
        $response->assertSee('Join Affiliate');
    }

    public function test_user_can_join_affiliate_program()
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $this->actingAs($user);

        // Join
        $response = $this->post(route('affiliate.join'));
        $response->assertRedirect(route('affiliate.index'));

        // Check DB
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'role' => 'affiliate',
        ]);
        $this->assertDatabaseHas('affiliates', [
            'user_id' => $user->id,
        ]);

        // Access Dashboard
        $response = $this->get(route('affiliate.index'));
        $response->assertStatus(200);
        $response->assertSee('Affiliate Dashboard');
        $response->assertSee('Generate Referral Link');
    }

    public function test_webinars_page_loads()
    {
        Webinar::create([
            'title' => 'Test Webinar',
            'slug' => 'test-webinar',
            'description' => 'A great webinar',
            'date' => now()->addDays(2),
            'price' => 0,
            'is_active' => true,
        ]);

        $response = $this->get('/webinars');

        $response->assertStatus(200);
        $response->assertSee('Test Webinar');
        $response->assertSee('Upcoming Webinars');
    }
}
