<?php

namespace Database\Seeders;

use App\Models\ProductFeature;
use Illuminate\Database\Seeder;

class ProductFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductFeature::factory(45)->create();
    }
}
