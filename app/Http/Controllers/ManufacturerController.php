<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;


class ManufacturerController extends Controller
{
    public function createManufacturer(){
   		return view('admin.manufacturer.createManufacturer');
   }


   public function storeManufacturer(Request $request){

		$this->validate($request, [
			'manufacturer_name'=>'required',
			'manufacturer_description'=>'required',
		]);
		
	   	$manufacturer = new Manufacturer();
	   	$manufacturer->manufacturer_name		 = $request->manufacturer_name;
	   	$manufacturer->manufacturer_description  = $request->manufacturer_description;
	   	$manufacturer->publication_status 	 	 = $request->publication_status;
	   	$manufacturer->save();


		return redirect('/manufacturer/add')->with('message', 'Manufacturer info save Successfully');
	}



	 public function manageManufacturer(){
	 	$manufacturer = Manufacturer::all();
   		return view('admin.manufacturer.manageManufacturer', ['manufacturer'=>$manufacturer]);
   }

   public function editManufacturer($id){
	 	 $manufacturerById = Manufacturer::find($id);
   		return view('admin.manufacturer.editManufacturer', ['manufacturerById'=>$manufacturerById]);
   }

   public function updateManufacturer(Request $request){

	 	 $manufacturer = Manufacturer::find($request->manufacturerid);
		  $manufacturer->manufacturer_name 			= $request->manufacturer_name;
		  $manufacturer->manufacturer_description   = $request->manufacturer_description;
		  $manufacturer->publication_status     	= $request->publication_status;
		  $manufacturer->save();
		return redirect('/manufacturer/manage')->with('message', 'Manufacturer info updated sucessfully');
   }


   public function deleteManufacturer($id){
	 	$manufacturer = Manufacturer::find($id);
		$manufacturer->delete();
		return redirect('/manufacturer/manage')->with('message', 'Manufacturer deleted sucessfully');
   }





}
