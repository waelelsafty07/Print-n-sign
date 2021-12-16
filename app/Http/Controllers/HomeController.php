<?php

namespace App\Http\Controllers;
use App\Models\edge;
use App\Models\Subcategories;
use App\Models\Categories;
use App\Models\Imageproducts;
use App\Models\paper_sizes;
use App\Models\paper_type;
use App\Models\paper_weight;
use App\Models\points;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function productsDetails($id){
        $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
            $categories = Categories::orderBy('id', 'asc')->get();
            $products = Products::where('id',$id)->get();
            $images = Imageproducts::where('product_id',$id)->get();
            return view('front.productsdetails',compact(['categories','subcategories','products','images']));
    }
    public function about_us()
    {
        $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
        $categories = Categories::orderBy('id', 'asc')->get();
        $products = Products::orderBy('id', 'asc')->get();
        return view('front.aboutus',compact(['categories','subcategories','products']));

    }
        public function categoryProduct($category_id){
            $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
            $categories = Categories::orderBy('id', 'asc')->get();
            $products = Products::where('category_id', $category_id)->get();
            return view('front.products',compact(['categories','subcategories','products']));

        }
        public function sc_product($category_id,$subcategory_id){
            $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
            $categories = Categories::orderBy('id', 'asc')->get();
            $products = Products::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();
            return view('front.products',compact(['categories','subcategories','products']));

        }


        public function products(){
            $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
            $categories = Categories::orderBy('id', 'asc')->get();
            $products = Products::orderBy('id', 'asc')->get();
            return view('front.products',compact(['categories','subcategories','products']));
            
        }

        public function home(){
            $subcategories = Subcategories::orderBy('category_id', 'asc')->get();
            $categories = Categories::orderBy('id', 'asc')->get();
            $products = Products::orderBy('id', 'asc')->limit(10)->get();
            // $Imageproducts = Imageproducts::find()->where('product_id',);
            return view('front.index',compact(['categories','subcategories','products']));
        }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
