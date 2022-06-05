<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guides()
    {
        $response = $this->get('/guides');

        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_profile()
    {
        $this->withoutMiddleware();

        $user = User::firstWhere('role_id' ,3);

        $response = $this->actingAs($user)->get('/admin/profile');

        $response->assertSee('Editar Usuari');
    }

    public function test_dashboard()
    {
        $this->withoutMiddleware();

        $user = User::firstWhere('role_id' ,3);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_doubts()
    {
        $this->withoutMiddleware();

        $user = User::firstWhere('role_id' ,3);

        $response = $this->actingAs($user)->get('/admin/questions');

        $response->assertStatus(200);
    }

    /**
     * Test departaments
     *
     * @return void
     */
    public function test_departament()
    {
        $this->withoutMiddleware();

        $user = User::firstWhere('role_id' ,3);

        $response = $this->actingAs($user)->get('/admin/departments');

        $response->assertStatus(200);
    }

    /**
     * Send data to test the creation of a question
     *
     * @return void
     */
    public function test_send_breakdown()
    {
        $this->withoutMiddleware();

        $user = User::firstWhere('role_id' ,3);

        $response = $this->actingAs($user)->post('/admin/breakdowns/create', [
            "title" => "Problemes amb el projector",
            "description" => "Prova test unitari",
            "device_id" => 1,
            "department_id" => 2,
            "zone_id" => 1,
            "user_id" => 2
        ]);

        $response->assertStatus(302);
    }



}
