<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $user = User::all();
        return view('admin.user', compact('user', 'loggedInUser'));
    }
    public function create(){
        $loggedInUser = Auth::user();
        return view('admin.usercreate', compact('loggedInUser'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_telepon' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->alamat = $request->alamat;
        $user->kode_pos = $request->kode_pos;
        $user->no_telepon = $request->no_telepon;
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
        return redirect()->route('admin.user')->with('message', 'User Added Successfully');
    }
    public function show($id){
        $loggedInUser = Auth::user();
        $user = User::find($id);
        return view('admin.user_detail', compact('user', 'loggedInUser')); 
    }
    public function edit($id){
        $loggedInUser = Auth::user();
        $user = User::find($id);
        return view('admin.user_edit', compact('user', 'loggedInUser'));
    }
    public function update(Request $request, $id){
        $user = User::find($id);

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
        return redirect()->route('admin.user')->with('message', 'User Updated Successfully');
    }   
    public function destroy($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }
}
