<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function index(Request $request)
    {
        $brand = Brand::orderBy("name", 'ASC')->get();
        $q_brand = $request->query("brand", old('brand'));
        $category = Category::orderBy("name", 'ASC')->get();
        $q_category = $request->query("category", old('category'));
        // $product = Product::where(function($query) use ($q_brand) {
        //                         $query->whereIn('id_brand', explode(',', $q_brand))->orWhereRaw("'".$q_brand."'=''");
        //                     })
        //                     ->where(function($query) use ($q_category) {
        //                         $query->whereIn('id_kategori', explode(',', $q_category))->orWhereRaw("'".$q_category."'=''");
        //                     })
        //                     ->orderBy('created_at', 'DESC')->paginate(10);
        if (!empty($q_brand)) {
            $q_brand_array = explode(',', $q_brand);
        } else {
            $q_brand_array = [];
        }

        if (!empty($q_category)) {
            $q_category_array = explode(',', $q_category);
        } else {
            $q_category_array = [];
        }
        $product = Product::where(function($query) use ($q_brand_array) {
                                if (!empty($q_brand_array)) {
                                    $query->whereIn('id_brand', $q_brand_array);
                                }
                            })
                            ->where(function($query) use ($q_category_array) {
                                if (!empty($q_category_array)) {
                                    $query->whereIn('id_kategori', $q_category_array);
                                }
                            })
                            ->orderBy('created_at', 'DESC')->paginate(48);
        $products = Product::all();
        return view('shop', ['product' => $product,  'products'=>$products,'brand' => $brand, 'q_brand' => $q_brand, 'category'=>$category, 'q_category'=>$q_category]);
    }

    public function productDetails($id){
        $product = Product::where('id', $id)->first();
        return view('users.shopdetails', compact('product'));
    }
}
