<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->user_type == 'admin'){
            return view('admin.index');
        }elseif(Auth::user()->user_type == 'vendor'){
            return view('vendor.index');
        }else{
            return view('customer.index');
        }
    }

    public function category()
    {
        $categories = Category::with('products')
            ->where('created_by', Auth::user()->id)
            ->paginate(10);
        return view('category',compact('categories'));
    }
    public function products()
    {
        $products = Product::with(['categories','features'])
            ->where('created_by', Auth::user()->id)
            ->paginate(3);
        return view('products',compact('products'));
    }
}
