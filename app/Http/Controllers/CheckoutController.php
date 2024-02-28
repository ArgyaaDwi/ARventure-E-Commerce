<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
    $user = Auth::user();
    $cartItems = ShoppingCart::whereHas('user', function ($query) use ($user) {
        $query->where('id_user', $user->id);
    })->where('is_checkout', false)->get();
    
    $order = Order::create([
        'id_user' => $user->id,
        'total_amount' => $cartItems->sum('harga'),
        'status' => 'process',
        'shipping_address' => $user->alamat,
        'postal_code' => $user->kode_pos,
        'no_telp' => $user->no_telepon,
    ]);
    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'id_cart' => $cartItem->id,
            'id_order' => $order->id,
            'id_product' => $cartItem->product->id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->harga,
        ]);
    }

    $cartItems->each->update(['is_checkout' => true]);

    // $cartItems->clearItems();    
    // $cartItems->each->delete();  
    // Hapus semua item keranjang yang telah dicheckout
    // ShoppingCart::whereIn('id', $cartIds)->delete();

    return redirect()->route('users.cart')->with('message', 'Checkout successful!');
}

}

