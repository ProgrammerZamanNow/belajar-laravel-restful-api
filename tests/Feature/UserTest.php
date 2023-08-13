<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('/api/users', [
            'username' => 'khannedy',
            'password' => 'rahasia',
            'name' => 'Eko Kurniawan Khannedy'
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    'username' => 'khannedy',
                    'name' => 'Eko Kurniawan Khannedy'
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post('/api/users', [
            'username' => '',
            'password' => '',
            'name' => ''
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    'username' => [
                        "The username field is required."
                    ],
                    'password' => [
                        "The password field is required."
                    ],
                    'name' => [
                        "The name field is required."
                    ]
                ]
            ]);
    }

    public function testRegisterUsernameAlreadyExists()
    {
        $this->testRegisterSuccess();
        $this->post('/api/users', [
            'username' => 'khannedy',
            'password' => 'rahasia',
            'name' => 'Eko Kurniawan Khannedy'
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    'username' => [
                        "username already registered"
                    ]
                ]
            ]);
    }


}
