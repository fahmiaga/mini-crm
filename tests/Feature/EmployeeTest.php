<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class EmployeeTest extends TestCase
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
    public function testCreateEmployee()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->post('/employee', []);
            $response->assertStatus(201);
        }
    }
    public function testUpdateEmployee()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->put('/employee/{id}', []);
            $response->assertStatus(200);
        }
    }
    public function testDeleteEmployee()
    {
        $key = Session::get('key');
        if ($key) {
            $response = $this->delete('/employee/{id}', []);
            $response->assertStatus(200);
        }
    }
}
