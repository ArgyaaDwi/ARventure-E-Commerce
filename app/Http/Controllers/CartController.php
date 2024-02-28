<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\User;
use App\Models\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index(){
        $cartItems = ShoppingCart::where('id_user', auth()->id())
        ->where('is_checkout', false)
        ->get();

        return view('users.cart', compact('cartItems'));
    }
    // public function addToCart(Request $request){
    //     $user = auth()->user();
    //     $product = Product::find($request->id);
    //     $existingCartItem = ShoppingCart::where('id_user', $user->id)
    //         ->where('id_product', $product->id)
    //         ->first();
    //     if ($existingCartItem) {
    //         $existingCartItem->update([
    //             'quantity' => $existingCartItem->quantity + $request->stock,
    //         ]);
    //     } else {
    //         ShoppingCart::create([
    //             'id_user' => $user->id,
    //             'id_product' => $product->id,
    //             'quantity' => $request->stock,
    //             'harga' => $product->harga * $request->stock,
    //         ]);
    //     }
    //     return redirect()->back()->with('message', 'Product has been added to the cart successfully!');
    // }
    public function addToCart(Request $request){
        $user = auth()->user();
        $product = Product::find($request->id);
        if ($product->stock >= $request->stock) {
            $existingCartItem = ShoppingCart::where('id_user', $user->id)
                ->where('id_product', $product->id)
                ->first();
            if ($existingCartItem) {
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + $request->stock,
                ]);
            } else {
                ShoppingCart::create([
                    'id_user' => $user->id,
                    'id_product' => $product->id,
                    'quantity' => $request->stock,
                    'harga' => $product->harga * $request->stock,
                ]);
            }
            $product->decrement('stock', $request->stock);
            return redirect()->back()->with('message', 'Product has been added to the cart successfully!');
        } else {
            return redirect()->back()->with('error', 'Insufficient stock!');
        }
    }
    public function updateCart(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        $cartItem = ShoppingCart::find($rowId);

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('users.cart')->with('message', 'Cart updated successfully!');
    }
    // public function destroy($id){
    //     $cartItems = ShoppingCart::find($id);
    //     if (!$cartItems) {
    //         return redirect()->back()->with('error', 'Category not found');
    //     }
    //     $cartItems->delete();
    //     return redirect()->back()->with('message', 'Items deleted successfully');
    // }
    public function destroy($id){
        $cartItem = ShoppingCart::find($id);
    
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Cart item not found');
        }
    
        // Tambahkan kembali stok produk
        $product = $cartItem->product;
        $product->increment('stock', $cartItem->quantity);
    
        // Hapus item dari keranjang
        $cartItem->delete();
    
        return redirect()->back()->with('message', 'Item has been removed from the cart successfully');
    }
    public function clearAllItems()
    {
        $user = Auth::user(); 
        $cartItems = $user->cartItems;
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
        return redirect()->route('users.cart')->with('success', 'All items cleared from the cart.');
    }
}
