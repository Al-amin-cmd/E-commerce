<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function welcome() {
        $shouldShowBanner = true;
        
        if($keyword = request('keyword')){
            $products = Product::latest()
                                  ->where('name', 'LIKE', '%{$keyword}%')
                                  ->paginate(12);
        } else {
            $products = Product::latest()->paginate(12);
        }

        $categories = Category::all();
        return view('welcome', compact('products','categories', 'shouldShowBanner'));
    }

    public function productlist(Category $category){
            return view('frontend.shop-grid', compact('category'));
    }

    public function productDetails(Product $product, Category $category){
        return view('frontend.shop-details', compact('product', 'category'));
    }






    public function index(){
        return view('frontend.index');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function blogDetails(){
        return view('frontend.blog-details');
    }

    public function checkout(){
        return view('frontend.checkout');
    }

    public function shopCart(){
        return view('frontend.shoping-cart');
    }

    public function shop(){
        return view('frontend.shop-grid');
    }

    public function shopDetails(){
        return view('frontend.shop-details');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
