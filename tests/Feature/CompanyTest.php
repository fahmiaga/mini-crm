<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testLoginTrue()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];

        $response = $this->post('login', $credential);

        $response->assertSessionDoesntHaveErrors();
    }
    public function testLoginFalse()
    {
        $credential = [
            'email' => 'random@random.com',
            'password' => 'invalidpassword'
        ];

        $response = $this->post('login', $credential);

        $response->assertSessionHasErrors();
    }
    public function testCreateCompany()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->post('/companies', []);
            $response->assertStatus(201);
        }
    }
    public function testUpdateCompany()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->put('/companies/{id}', []);
            $response->assertStatus(200);
        }
    }
    public function testDeleteCompany()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->delete('/companies/{id}', []);
            $response->assertStatus(200);
        }
    }
}
