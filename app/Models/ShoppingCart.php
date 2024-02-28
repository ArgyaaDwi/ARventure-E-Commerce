<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_product', 'quantity', 'harga', 'is_checkout'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function calculateSubtotal()
    {
        // return $this->quantity * $this->harga;
        return $this->harga;
    }
    // public function clearItems()
    // {
    //     $this->where('id_user', $this->user->id)->delete();
    // }
    public function clearItems()
    {
    // Dapatkan item yang akan dihapus


    // Hapus ketergantungan pada tabel order_items

    // Hapus item dari tabel shopping_carts
    $this->cartItems()->delete();
    }

    public function cartItems()
    {
        return $this->hasMany(ShoppingCart::class, 'id_user');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_cart');
    }
}
