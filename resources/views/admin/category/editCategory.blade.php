@extends('admin.master')

@section('content')

<br/>
<hr/>
<h1 class="text-center text-success">Add Category Form</h1>
<hr/>
<h2 class="text-center text-success">{{ Session::get('message') }}</h2>
<hr/>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			{!! Form::open(['url'=>'category/update', 'method'=> 'POST', 'class'=> 'form-horizontal', 'name'=>'editCategoryForm']) !!}
				
				
				<div class="form-group">
					<label for="category_name" class="control-label col-sm-3">Category Name :</label>

					<div class="col-sm-9">
						<input class="form-control" value="{{ $categoryById->category_name }}" id="category_name"  type="text" name="category_name">
						<input class="form-control" value="{{ $categoryById->id }}" type="hidden" name="categoryid">
					
					</div>
				</div>


				<div class="form-group">
					<label for="category_description" class="control-label col-sm-3">Category Description :</label>

					<div class="col-sm-9">
						<textarea class="form-control" name="category_description" id="category_description" >{{ $categoryById->category_description }}</textarea>
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
						<input type="submit" name="btn"  value="Update Category Info" class="btn btn-success btn-block">
					</div>
				</div>


			{!! Form::close() !!}
		</div>
	</div>
		
</div>
<script>
	document.forms['editCategoryForm'].elements['publication_status'].value={{ $categoryById->publication_status }}
</script>
@endsection