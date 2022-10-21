<?php

namespace Tests\Feature;

use App\Models\Brand;
use Tests\TestCase;

class BrandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_lists_brands()
    {
        $response = $this->get('/api/brands');
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [['id', 'name']]]);
    }
    private function randomId()
    {
        return Brand::inRandomOrder()->first()->id;
    }
    private function randomData()
    {
        $data = Brand::factory()->definition();
        return $data;
    }
    public function test_show_brand_not_exists()
    {
        $brand = 10000;
        $response = $this->get("/api/brands/$brand");
        $response->assertStatus(404);
    }
    public function test_show_detail_of_brand()
    {
        $brand = $this->randomId();
        $response = $this->get("/api/brands/$brand");
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => ['id', 'name']]);
    }
    public function test_create_new_brand()
    {
        $data = $this->randomData();
        $response = $this->post('/api/brands', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure(['data' => ['id', 'name']]);
        return $response->json()['data']['id'];
    }
    public function test_update_existing_brand()
    {
        $brand = $this->randomId();
        $data = $this->randomData();
        $response = $this->put("/api/brands/$brand", $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => ['id', 'name']]);
    }
    public function test_delete_brand()
    {
        $brand = $this->test_create_new_brand();
        $response = $this->delete("/api/brands/$brand");
        $response->assertStatus(204);
    }
}
