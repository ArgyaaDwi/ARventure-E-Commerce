<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'total_amount', 'status', 'shipping_address', 'postal_code', 'no_telp'];
    public function user()
    {
    return $this->belongsTo(User::class, 'id_user');
    }

    public function orderItems()
    {
    return $this->hasMany(OrderItem::class, 'id_order');
    }
}
