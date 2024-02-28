<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $product = Product::all();
        return view('admin.product', compact( 'product','loggedInUser'));
    }
    public function create(){
        $loggedInUser = Auth::user();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.productcreate', compact('category','brand','loggedInUser'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'harga' => 'required|numeric|min:0',
            'id_kategori' => 'required|exists:categories,id',
            'id_brand' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:0',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->harga = $request->harga;
        $product->id_kategori = $request->id_kategori;
        $product->stock = $request->stock;
        $product->id_brand = $request->id_brand; 
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            if ($image->isValid()) {
                $imagename = $image->getClientOriginalName();
                Storage::disk('public')->put('userpic/product/' . $imagename, file_get_contents($image));

                $product->product_image = $imagename;
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }
        $product->save();
        return redirect()->route('admin.product')->with('message', 'Product Added Successfully');
    }
    public function show($id){
        $loggedInUser = Auth::user();
        $product = Product::find($id);
        return view('admin.product_detail', compact('product', 'loggedInUser'));   
    }
    public function edit($id){
        $loggedInUser = Auth::user();
        $product = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product_edit', compact('product', 'category','brand','loggedInUser'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'harga' => 'required|numeric|min:0',
            'id_kategori' => 'required|exists:categories,id',
            'id_brand' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:0',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->id_kategori = $request->id_kategori;
        $product->id_brand = $request->id_brand;     
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            if ($image->isValid()) {
                if ($product->product_image) {
                    Storage::disk('public')->delete('userpic/product/' . $product->product_image);
                }
                $imagename = $image->getClientOriginalName();
                Storage::disk('public')->put('userpic/product/' . $imagename, file_get_contents($image));
                $product->product_image = $imagename;
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid.');
            }
        }
        $product->save();
        return redirect()->route('admin.product')->with('message', 'Product Updated Successfully');
    }
    public function destroy($id){
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }
}

