<?php

namespace Database\Seeders;

use App\Models\SubCategoryFeature;
use Illuminate\Database\Seeder;

class SubCategoryFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategoryFeature::factory(300)->create();
    }
}
