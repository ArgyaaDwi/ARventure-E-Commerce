<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(){        
        $loggedInUser = Auth::user();
        return view('users.index', compact('loggedInUser'));
    }
    public function aboutUs(){
        $loggedInUser = Auth::user();
        return view('users.aboutus', compact('loggedInUser'));
    }
    public function contactUs(){
        $loggedInUser = Auth::user();
        return view('users.contactus', compact('loggedInUser'));
    }
    public function history(){
        $order =Order::where('id_user', auth()->id())->get();
        return view('users.history', compact('order'));
    }
    public function historyDetail($id){
        $loggedInUser = Auth::user();
        $order = Order::with('orderItems')->find($id);
        return view('users.historydetail', compact('order', 'loggedInUser'));  
    }
    public function edit(){
        $loggedInUserId = Auth::id();
        $loggedInUser = User::find($loggedInUserId);
    
        if (!$loggedInUser) {
            return redirect()->route('home')->with('error', 'User not found');
        }
        return view('users.useredit', compact('loggedInUser'));
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
        return redirect()->route('users.index')->with('message', 'User Updated Successfully');
    }   
    public function sendMessage(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $user = Auth::user();
        $message = new Message([
            'content' => $request->input('content'),
            'id_user' => $user->id,
        ]);
        $message->save();
        return redirect()->back()->with('message', 'Message send successfully!');
    }
}    
