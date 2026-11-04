<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ContactWebTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_inertia_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_submit_contact_form(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Pooja Sharma',
            'email' => 'pooja@example.com',
            'phone' => '+91 9876543210',
            'topic' => 'Volunteering',
            'message' => 'Ready to volunteer in Patna!',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contacts', [
            'email' => 'pooja@example.com',
            'topic' => 'Volunteering',
        ]);
    }
}
