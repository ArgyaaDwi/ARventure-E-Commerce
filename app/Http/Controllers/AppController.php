<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import model Category di sini


class AppController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('index', compact('category'));
    }
}
