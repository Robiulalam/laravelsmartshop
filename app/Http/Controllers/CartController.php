<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index(Request $request){

    	$product_id = $request->product_id;
    	$productById = Product::find($product_id);
    
    	Cart::add([
    	'id' => $productById->id,
    	'name' => $productById->product_name, 
    	'price' => $productById->product_price, 
    	'qty' => $request->product_quantity,
    	]);


    	return redirect('/show-cart');
    }

    public function cartView(){
    	$cartProduct = Cart::content();
    	return view('frontEnd.cart.showCart',['cartProduct'=>$cartProduct]);
    }



    public function updateCart(Request $request){
    	Cart::update($request->rowId, $request->product_quantity );
    	return redirect('/show-cart')->with('message', 'Product Quantity Info update successfully');
    }

    public function removeCart($rowId){
    	Cart::remove($rowId);
    	return redirect('/show-cart')->with('message', 'Product Info delete successfully');
    }





}
