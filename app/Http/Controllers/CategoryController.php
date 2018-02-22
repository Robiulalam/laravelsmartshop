<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
   public function createCategory(){
   		return view('admin.category.createCategory');
   }

	public function storeCategory(Request $request){

		$this->validate($request, [
			'category_name'=>'required',
			'category_description'=>'required',
		]);

		// DB::table('categories')->insert([
		// 	'category_name'=>$request->category_name,
		// 	'category_description'=>$request->category_description,
		// 	'publication_status'=>$request->publication_status,
		// ]);


	   	$category = new Category();
	   	$category->category_name		 = $request->category_name;
	   	$category->category_description  = $request->category_description;
	   	$category->publication_status 	 = $request->publication_status;
	   	$category->save();


		

	   	return redirect('/category/add')->with('message', 'Category info save Successfully');
	}

	public function manageCategory(){
		$categories = Category::all();
		return view('admin.category.manageCategory', ['categories'=>$categories]);
	}

	public function editCategory($id){
		 // $categoryById = Category::where('id', $id)->first();
		  $categoryById = Category::find($id);
		return view('admin.category.editCategory', ['categoryById'=>$categoryById]);
	}

	public function updateCategory(Request $request){
		 
		  $category = Category::find($request->categoryid);
		  $category->category_name 			= $request->category_name;
		  $category->category_description   = $request->category_description;
		  $category->publication_status     = $request->publication_status;
		  $category->save();
		return redirect('/category/manage')->with('message', 'Category info updated sucessfully');
	}


	public function deleteCategory($id){
			$category = Category::find($id);
			$category->delete();
			return redirect('/category/manage')->with('message', 'Category deleted sucessfully');
	}



}
