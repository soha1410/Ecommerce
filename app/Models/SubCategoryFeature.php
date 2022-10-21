<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryFeature extends Model
{
    use HasFactory;
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function productFeatures()
    {
        return $this->hasMany(ProductFeatures::class);
    }
}
