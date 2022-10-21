<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function productFeatures()
    {
        return $this->hasMany(ProductFeature::class);
    }
    public function features()
    {
        return $this->hasMany(SubCategoryFeature::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function purchasesItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
