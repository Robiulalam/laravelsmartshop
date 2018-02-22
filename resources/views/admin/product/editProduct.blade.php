@extends('admin.master')

@section('content')

<br/>
<hr/>
<h3 class="text-center text-success">Add Product </h3>
<hr/>
<h2 class="text-center text-success">{{ Session::get('message') }}</h2>
<hr/>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			{!! Form::open(['url'=>'product/update', 'method'=> 'POST', 'class'=> 'form-horizontal','enctype'=>'multipart/form-data', 'name'=>'editProductForm' ] ) !!}
				
				
				<div class="form-group">
					<label for="product_name" class="control-label col-sm-3">Product Name :</label>

					<div class="col-sm-9">
						<input class="form-control" id="product_name" value="{{ $productById->product_name }}" type="text" name="product_name">
						<input class="form-control"  value="{{ $productById->id }}" type="hidden" name="productId">
						<span class="text-danger">{{ $errors->has('product_name')? $errors->first('product_name'):'' }}</span>
					</div>
				</div>

				<div class="form-group">	
					<label for="categoryId" class="control-label col-sm-3">Category Name :</label>

					<div class="col-sm-9">
						<select class="form-control" name="categoryId" id="categoryId">
							<option>--Select Category Name--</option>
							@foreach($categories as $categories)
							<option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">	
					<label for="manufacturerId" class="control-label col-sm-3">Manufacturer Name :</label>

					<div class="col-sm-9">
						<select class="form-control" name="manufacturerId" id="manufacturerId">
							<option>--Select Category Name--</option>
							@foreach($manufacturer as $manufacturer)
							<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturer_name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="product_price" class="control-label col-sm-3">Product Price :</label>

					<div class="col-sm-9">
						<input class="form-control" id="product_price" value="{{ $productById->product_price }}" type="number" name="product_price">
						<span class="text-danger">{{ $errors->has('product_price')? $errors->first('product_price'):'' }}</span>
					</div>
				</div>

				<div class="form-group">
					<label for="product_quantity" class="control-label col-sm-3">Product Quantity :</label>

					<div class="col-sm-9">
						<input class="form-control" value="{{ $productById->product_quantity }}" id="product_quantity" type="number" name="product_quantity">
						<span class="text-danger">{{ $errors->has('product_quantity')? $errors->first('product_quantity'):'' }}</span>
					</div>
				</div>


				<div class="form-group">
					<label for="product_short_description" class="control-label col-sm-3">Product Short Description :</label>

					<div class="col-sm-9">
						<textarea class="form-control" name="product_short_description" style="resize: none;" rows="5" id="product_short_description" >{{ $productById->product_short_description }}</textarea>
						<span class="text-danger">{{ $errors->has('product_short_description')? $errors->first('product_short_description'):'' }}</span>
					</div>
				</div>

				<div class="form-group">
					<label for="product_long_description" class="control-label col-sm-3">Product Long Description :</label>

					<div class="col-sm-9">
						<textarea class="form-control" name="product_long_description" rows="5" style="resize: none;" id="product_long_description" >{{ $productById->product_long_description }}</textarea>
						<span class="text-danger">{{ $errors->has('product_long_description')? $errors->first('product_long_description'):'' }}</span>
					</div>
				</div>

				<div class="form-group">
					<label for="product_image" class="control-label col-sm-3">Product Image :</label>

					<div class="col-sm-9">
						<input class="form-control" id="product_image" accept="image/*" type="file" name="product_image">
						<img src="{{ asset($productById->product_image) }}" alt="" height="150" width="150">
						<span class="text-danger">{{ $errors->has('product_image')? $errors->first('product_image'):'' }}</span>
					</div>
				</div>


				


				<div class="form-group">	
					<label for="publication_status" class="control-label col-sm-3">Publication Status :</label>

					<div class="col-sm-9">
						<select class="form-control" name="publication_status" id="publication_status">
							<option>--Select Publication status--</option>
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
					</div>
				</div>

				<div class="form-group">	
					

					<div class="col-sm-9 col-sm-offset-3">
						<input type="submit" name="btn"  value="update Product Info" class="btn btn-success btn-block">
					</div>
				</div>


			{!! Form::close() !!}
		</div>
	</div>
		
</div>
<script>
	document.forms['editProductForm'].elements['publication_status'].value={{ $productById->publication_status }}
	document.forms['editProductForm'].elements['categoryId'].value={{ $productById->categoryId }}
	document.forms['editProductForm'].elements['manufacturerId'].value={{ $productById->manufacturerId }}
</script>
@endsection