<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_check_returns_ok(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'healthy',
                'application' => 'Anantyodya Welfare Foundation API',
            ]);
    }

    public function test_can_submit_contact_form(): void
    {
        $payload = [
            'name' => 'Ramesh Kumar',
            'email' => 'ramesh@example.com',
            'phone' => '+91 9876543210',
            'topic' => 'Volunteering',
            'message' => 'I would like to volunteer for health camps in Masaurhi.',
        ];

        $response = $this->postJson('/api/contact', $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Thank you! Your message has been received. Our team will get back to you shortly.',
                'data' => [
                    'name' => 'Ramesh Kumar',
                    'email' => 'ramesh@example.com',
                    'topic' => 'Volunteering',
                ],
            ]);

        $this->assertDatabaseHas('contacts', [
            'email' => 'ramesh@example.com',
            'topic' => 'Volunteering',
        ]);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->postJson('/api/contact', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}

