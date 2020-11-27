<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function detail($id){
        $products = Product::all();
        $product = Product::find($id);
        $images = $product->image;
        $categories = Category::all();
        return view('frontend.shop-detail',[
            'products' => $products,
            'product' => $product,
            'categories' => $categories,
            'images' => $images
        ]);

    }
    public function like($id){
        $product = Product::find($id);
        $product->like =$product->like + 1;
        $product->save();
        return redirect()->route('frontend.dashboard');
    }

}
