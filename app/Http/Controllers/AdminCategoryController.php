<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminCategoryController extends Controller
{
    // public function index(){
    //     $message = session('message'); 
    //     $category = category::all();
    //     return view('admin.category', compact('category'));
    // }
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $category = Category::all();
        return view('admin.category', compact('category', 'loggedInUser'));
    }
    public function create(){
        $loggedInUser = Auth::user();
        return view('admin.categorycreate', compact('loggedInUser'));
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',           
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = new Category;
        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Periksa apakah file gambar valid
            if ($image->isValid()) {
                $imagename = $image->getClientOriginalName();
                // Simpan file ke penyimpanan (Storage)
                Storage::disk('public')->put('userpic/category/' . $imagename, file_get_contents($image));

                $category->image = $imagename;
            } else {
                // Tindakan jika file tidak valid
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }
        $category->save();
        // Redirect dengan pesan sukses
        return redirect()->route('admin.category')->with('message', 'Category Added Successfully');
    }
    public function edit($id){
        $loggedInUser = Auth::user();
        $category = Category::find($id);
        return view('admin.category_edit', compact('category', 'loggedInUser'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Temukan kategori berdasarkan ID
        $category = Category::findOrFail($id);
        $category->name = $request->name;   
        // Periksa apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Periksa apakah file gambar valid
            if ($image->isValid()) {
                // Hapus gambar lama jika ada
                if ($category->image) {
                    Storage::disk('public')->delete('userpic/category/' . $category->image);
                }
                $imagename = $image->getClientOriginalName();
                Storage::disk('public')->put('userpic/category/' . $imagename, file_get_contents($image));
                $category->image = $imagename;
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }
        $category->save();
        return redirect()->route('admin.category')->with('message', 'Category Updated Successfully');
    }
    public function destroy($id){
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
