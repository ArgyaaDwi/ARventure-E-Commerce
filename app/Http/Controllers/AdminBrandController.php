<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class AdminBrandController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $brand = Brand::all();
        return view('admin.brand', compact('brand', 'loggedInUser'));
    }
    public function create(){
        $loggedInUser = Auth::user();
        return view('admin.brandcreate', compact('loggedInUser'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',           
        ]);
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();
        // Redirect dengan pesan sukses
        return redirect()->route('admin.brand')->with('message', 'Brand Added Successfully');
    }
    public function edit($id){
        $loggedInUser = Auth::user();
        $brand = Brand::find($id);
        return view('admin.brand_edit', compact('brand', 'loggedInUser'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;   
        $brand->save();
        return redirect()->route('admin.brand')->with('message', 'Brand Updated Successfully');
    }
    public function destroy($id){
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }
        $brand->delete();
        return redirect()->back()->with('message', 'Brand deleted successfully');
    }
}
