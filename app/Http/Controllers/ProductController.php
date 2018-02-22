<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Image;

class ProductController extends Controller
{

    public function createProduct(){
    	$categories = Category::where('publication_status',1)->get();
    	$manufacturer = Manufacturer::where('publication_status',1)->get();
    	return view('admin.product.createProduct', ['categories'=>$categories, 'manufacturer'=>$manufacturer]);
    }


    public function storeProduct(Request $request){
    	$this->validate($request,[
    		'product_name'=>'required',
    		'product_price'=>'required',
    		'product_image'=>'required',
    	]);


    	

    	$productImage = $request->file('product_image');
        $uploadPath = 'public/productImage/';
        $imageExtension = $productImage->getClientOriginalExtension();
    	$imageName = $request->product_name.'.'.$imageExtension;
    	// $productImage->move($uploadPath,$imageName);
    	$imageUrl = $uploadPath.$imageName;
        Image::make($productImage)->resize(255, 291)->save($uploadPath.$imageName);

    	$this->saveProductInfo($request,$imageUrl);
    	return redirect('/product/add')->with('message','Product Info save sucessfully');
    	
    }

    protected function saveProductInfo($request, $imageUrl){
    	$product = new Product();
    	$product->product_name = $request->product_name;
    	$product->categoryId = $request->categoryId;
    	$product->manufacturerId = $request->manufacturerId;
    	$product->product_price = $request->product_price;
    	$product->product_quantity = $request->product_quantity;
    	$product->product_short_description = $request->product_short_description;
    	$product->product_long_description = $request->product_long_description;
    	$product->product_image = $imageUrl;
    	$product->publication_status = $request->publication_status;
    	$product->save();
    }


    public function manageProduct(){
    	$products = DB::table('products')
    				->join('categories', 'products.categoryId', '=', 'categories.id')
    				->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
    				->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name')
    				->get();
    	return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function viewProduct($id){
    	$productById = DB::table('products')
    				->join('categories', 'products.categoryId', '=', 'categories.id')
    				->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
    				->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name')
    				->where('products.id',$id)
    				->first();
    	return view('admin.product.viewProduct',['product'=>$productById]);
    }

    public function editProduct($id){
        $categories = Category::where('publication_status',1)->get();
        $manufacturer = Manufacturer::where('publication_status',1)->get();
        $productById = Product::where('id',$id)->first();
        return view('admin.product.editProduct',['productById'=>$productById,'categories'=>$categories, 'manufacturer'=>$manufacturer]);
    }

    public function updateProduct(Request $request){

        $this->validate($request,[
            'product_name'=>'required',
            'product_price'=>'required',
            'product_image'=>'required',
        ]);

       $imageUrl = $this->imageExistStatus($request);


       $product = new Product();
        $product->product_name = $request->product_name;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        return redirect('/product/manage')->with('message','Product Update sucessfully');
      
        

        
    }

    private function imageExistStatus($request){
        $productById = Product::where('id',$request->productId)->first();
        $productImage = $request->file('product_image');

        if ($productImage) {
            // unlink($productById->product_image);
            // $name = $productImage->getClientOriginalName();
            // $uploadPath = 'public/productImage/';
            // $productImage->move($uploadPath, $name);   
            // $imageUrl = $uploadPath . $name;

           unlink($productById->product_image);
            $imageExtension = $productImage->getClientOriginalExtension();
            $imageName = $request->product_name.'.'.$imageExtension;
             $uploadPath = 'public/productImage/';
            Image::make($productImage)->resize(255, 291)->save($uploadPath.$imageName);
            $imageUrl = $uploadPath.$imageName;


          
            // $uploadPath = 'public/productImage/';
            // $imageExtension = $productImage->getClientOriginalExtension();
            // $imageName = $request->product_name.'.'.$imageExtension;
            // // $productImage->move($uploadPath,$imageName);
            // $imageUrl = $uploadPath.$imageName;
            // Image::make($productImage)->resize(255, 291)->save($uploadPath.$imageName);

            }else{
                $imageUrl =  $productById->product_image;  
        }
        return $imageUrl;

    }

    public function deleteProduct($id){
        $productById = Product::find($id);
        unlink( $productById->product_image);
        $productById->delete();
        return redirect('/product/manage')->with('message', 'Product Info Update sucessfully');
    }

   


}
