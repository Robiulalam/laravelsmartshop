@extends('admin.master')

@section('content')
<hr/>
<table class="table table-bordered table-hover">
	<tr>
		<th style="width: 20%;">Product Id</th>
		<th>{{ $product->id }}</th>
	</tr>

	<tr>
		<th>Product Name</th>
		<th>{{ $product->product_name }}</th>
	</tr>

	<tr>
		<th>Category Name</th>
		<th>{{ $product->category_name }}</th>
	</tr>

	<tr>
		<th>Manufacture Name</th>
		<th>{{ $product->manufacturer_name }}</th>
	</tr>

	<tr>
		<th>Product Price</th>
		<th>{{ $product->product_price }}</th>
	</tr>

	<tr>
		<th>Product Quantity</th>
		<th>{{ $product->product_quantity }}</th>
	</tr>

	<tr>
		<th>Publication Short Disc</th>
		<th>{{ $product->product_short_description }}</th>
	</tr>

	<tr>
		<th>Publication Long Disc</th>
		<th>{{ $product->product_long_description }}</th>
	</tr>

	<tr>
		<th>Product Image</th>
		<th><img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" height="200" width="200"></th>
	</tr>

	<tr>
		<th>Publication Status</th>
		<th>{{ $product->publication_status == 1 ? 'Published':'Unpublished'}}</th>

	</tr>


</table>
@endsection