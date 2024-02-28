<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $user=User::all();
        $product=Product::all();
        $order=Order::all();
        $brand=Brand::all();
        $messages = Message::latest()->take(3)->get();
        $recentUser = User::latest()->take(5)->get();
        return view('admin.index', compact('user','order','product','recentUser','brand','loggedInUser', 'messages'));
    }
    public function show(){
        $loggedInUser = Auth::user();
        return view('admin.adminprofile', compact( 'loggedInUser'));   
    }
    public function edit(){
        $loggedInUserId = Auth::id();
        $loggedInUser = User::find($loggedInUserId);
    
        if (!$loggedInUser) {
            return redirect()->route('home')->with('error', 'User not found');
        }
    
        return view('admin.adminprofileedit', compact('loggedInUser'));
    }
    public function update(Request $request){
        $user = User::find(Auth::id()); 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_telepon' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->kode_pos = $request->kode_pos;
        $user->no_telepon = $request->no_telepon;
        if ($request->has('password') && !empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            if ($foto->isValid()) {
                $fotoname = $foto->getClientOriginalName();
                Storage::disk('public')->put('userpic/user/' . $fotoname, file_get_contents($foto));
                $user->foto = $fotoname;
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }
        $user->save();
        return redirect()->route('admin.adminprofile')->with('message', 'User Updated Successfully');
    }   
}
