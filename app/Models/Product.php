<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'remaining_quantity',
        'expiry_date',
        'description',
        'image',
        'brand_id',
        'category_id',
        'status'
    ];

    public function scopeProductActived($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOfCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeOfBrand($query, $brandId)
    {
        return $query->where('brand_id', $brandId);
    }

    public function scopeExpiringSoon($query)
    {
        return $query->where('expiry_date', '<=', now()->addDays(7));
    }

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeInStock($query)
    {
        return $query->where('remaining_quantity', '>', 0);
    }
}
