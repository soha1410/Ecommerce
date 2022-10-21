<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function visibleScope($query)
    {
        $query->where('visibility', true);
    }
    public function availableScope($query)
    {
        $query->where('available_count', '>', 0);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }
}
