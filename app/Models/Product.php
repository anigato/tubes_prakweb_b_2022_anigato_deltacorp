<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function slidder(){
        return $this->belongsTo(Slidder::class);
    }
    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }
    public function order(){
    }
}
