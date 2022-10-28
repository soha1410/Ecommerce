<?php

namespace Tests\Feature;

use App\Models\Activation;
use Tests\TestCase;
use Faker\Factory as Faker;

class AuthTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker::create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $data = $this->test_register();
        $response = $this->post('/api/login', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }
    public function test_register()
    {
        $phone = $this->test_request_code();
        $code = Activation::where('phone', $phone)->first()->code;
        $password = uniqid();
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'code' => $code,
            'password' => $password,
            'phone' => $phone
        ];
        $response = $this->post('/api/register', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
        return ['password' => $password, 'phone' => $phone];
    }
    public function test_request_code()
    {
        $phone = $this->faker->numerify('09#########');
        $response = $this->post('/api/requestCode', ['phone' => $phone]);
        $response->assertStatus(200);
        return $phone;
    }
}
