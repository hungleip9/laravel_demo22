<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        //cache categories number
        $categories_number = Cache::remember('categories_number',5,function (){
            $categories_number = Category::count();
            return $categories_number;
        });
        //end cache categories number
        return view('backend.categories.index',[
            'categories' => $categories,
            'categories_number' => $categories_number
        ]);
    }
    public function showProducts($id){
        $category = Category::find($id);
        $products = $category->product;
        return view('backend.categories.showProduct',[
            'products' => $products
        ]);
    }
    public function create(){
        $categories = Category::all();
        return view('backend.categories.create',[
            'categories' => $categories
        ]);
    }
    public function  store(StoreCategoryRequest $request){
        $category = new Category();
        $category->name =$request->get('name');
//        $category->slug = \Illuminate\Support\Str::slug($request->get('slug'));
        $category->parent_id =$request->get('parent_id');
        $category->depth =$request->get('depth');
        $category->save();
        if($category->save()){
            $request->session()->flash('success','Tạo mới thành công');
        }else{
            $request->session()->flash('error','Tạo mới không thành công thành công');
        }
        return redirect()->route('backend.categories.index');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('backend.categories.edit',[
            'category' => $category
        ]);
    }
    public function upload(StoreCategoryRequest $request,$id){
        //lay du lieu tu form
        $name = $request->get('name');
        //upload du lieu
        $category = Category::find($id);
        $category->name =$name;
        $category->save();
        return redirect(route('backend.categories.index'));
    }
//    public function detail($id){
//        $category = Category::find($id);
//        $products = $category->products;
//        return view('frontend.shop-detail',[
//            'category' => $category,
//            'products' => $products
//        ]);
//    }
    public function destroy(Request $request,$id)
    {
        $category = Category::find($id);
        $category->delete();
        //session
        if (!$category->delete()){
            $request->session()->flash('success','Xóa thành công');

        }else{
            $request->session()->flash('error','Xóa không thành công');
        }
        //end session
        return redirect()->route('backend.categories.index');
    }

}
