<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function detail($id){
        $categories = Category::all();
        $images = Image::all();
        $category = Category::find($id);
        $products = $category->product;
        return view('frontend.category-detail',[
            'categories' => $categories,
            'category' => $category,
            'images' => $images,
            'products' =>$products
        ]);
    }


}
