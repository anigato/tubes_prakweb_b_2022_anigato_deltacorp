<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
            return $query->where('name', 'like', '%' . $keyword . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        });

        $query->when($filters['brand'] ?? false, function ($query, $brand) {
            return $query->whereHas('brand', function ($query) use ($brand) {
                $query->where('id', $brand);
            });
        });
    }



    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function slidder()
    {
        return $this->hashMany(Slidder::class);
    }
    public function wishlist()
    {
        return $this->hashMany(Wishlist::class);
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
