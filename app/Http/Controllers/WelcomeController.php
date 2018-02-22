<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class WelcomeController extends Controller
{
   public function index(){
   		$publishedProduct = Product::where('publication_status', 1)->get();
   		return view('frontEnd.home.homeContent',['publishedProduct'=>$publishedProduct]);
   }

   public function category($id){
         $publishedCategory = Category::where('id', $id)->where('publication_status',1)->get();
   		$publishedCategoryProduct = Product::where('categoryId', $id)->where('publication_status',1)->get();
   		return view('frontEnd.category.categoryContent',['publishedCategoryProduct'=>$publishedCategoryProduct, 'publishedCategory'=>$publishedCategory]);
   }

   public function productDetails($id){
         $productById = Product::where('id', $id)->first();
   		return view('frontEnd.product.productDetails',['productById'=>$productById]);
   }











}


