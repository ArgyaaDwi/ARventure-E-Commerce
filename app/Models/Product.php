<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'description',
        'harga',
        'id_kategori',
        'id_brand',
        'stock',
        'product_image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }
    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'id_product');
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'id_product');
    }
}
