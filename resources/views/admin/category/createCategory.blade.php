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
			{!! Form::open(['url'=>'category/save', 'method'=> 'POST', 'class'=> 'form-horizontal']) !!}
				
				
				<div class="form-group">
					<label for="category_name" class="control-label col-sm-3">Category Name :</label>

					<div class="col-sm-9">
						<input class="form-control" id="category_name" type="text" name="category_name">
						<span class="text-danger">{{ $errors->has('category_name')? $errors->first('category_name'):'' }}</span>
					</div>
				</div>


				<div class="form-group">
					<label for="category_description" class="control-label col-sm-3">Category Description :</label>

					<div class="col-sm-9">
						<textarea class="form-control" name="category_description" id="category_description" ></textarea>
						<span class="text-danger">{{ $errors->has('category_description')? $errors->first('category_description'):'' }}</span>
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
						<input type="submit" name="btn"  value="Save Category Info" class="btn btn-success btn-block">
					</div>
				</div>


			{!! Form::close() !!}
		</div>
	</div>
		
</div>
@endsection