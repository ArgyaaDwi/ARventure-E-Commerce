<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTransactionController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $order  = Order::all();
        return view('admin.transaction', compact('order','loggedInUser'));
    }
    public function complete($id)
    {
    $order = Order::findOrFail($id);
    $order->status = 'complete';
    $order->save();
    return redirect()->route('admin.transaction')->with('message', 'Order status updated successfully.');
    }
    public function show($id){
        $loggedInUser = Auth::user();
        $order = Order::find($id);
        return view('admin.transaction_detail', compact('order', 'loggedInUser'));   
    }
}
