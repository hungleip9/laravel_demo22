<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $items = Cart::content();
        $categories = Category::get();
        $images = Image::all();
        $products = Product::orderBy('updated_at','desc')->paginate(8);
        return view('frontend.cart',[
            'categories' => $categories,
            'images' => $images,
            'products' => $products,
            'items' => $items
        ]);
    }
    public function add($id){

        $product = Product::find($id);
        if (!empty($product->sale_price)){
            $sale = $product->sale_price;
        }else{
            $sale = $product->origin_price;
        }
        Cart::add($product->id, $product->name,1,$sale

            ,0,
        [
            'image' => $product->avatar
        ]
        );
        return redirect(route('frontend.cart.index'));
    }
    public function remove($cart_id){
        Cart::remove($cart_id);
        return redirect(route('frontend.cart.index'));
    }
}
