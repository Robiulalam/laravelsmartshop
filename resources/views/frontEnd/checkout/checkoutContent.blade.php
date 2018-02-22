@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('mainContent')

<hr/>

<h3 class="text-center text-success" >{{ Session::get('message') }}</h3>
<hr/>
<div class="container">
	<div class="row">
		
			<div class="col-md-12">
			<div class="well text-success text-center">
				you have to login to complete your valuable order. If you are not registered then please register first...
			</div>
		</div>
		
	</div>



	<div class="row">
		<div class="col-md-6">
			<div class="well">
				<hr/>
					<h3 class="text-center text-success">You may login from here</h3>
				<hr/>
				<form class="form-horizontal" action="{{ url('/user-login') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="" class="control-label col-md-3">Email</label>
						<div class="col-md-9">
						<input type="email" name="email_address" class="form-control">
						<span class="text-danger" ">{{ $errors->has('email_address')?$errors->first('email_address'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Password</label>
						<div class="col-md-9">
						<input type="password" name="password" class="form-control">
						<span class="text-danger" ">{{ $errors->has('password')?$errors->first('password'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-md-9 col-md-offset-3">
						<input type="submit" name="btn" class="btn btn-success btn-block" value="Login">
						</div>
					</div>

				</form>
			</div>
		</div>




		<div class="col-md-6">
			<div class="well">
				<hr/>
					<h3 class="text-center text-success">You may Register from here</h3>
				<hr/>
				<form class="form-horizontal" action="{{ url('/new-customer') }}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="" class="control-label col-md-3">First Name</label>
						<div class="col-md-9">
						<input type="text" name="first_name" class="form-control">
						<span class="text-danger" ">{{ $errors->has('first_name')?$errors->first('first_name'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Last Name</label>
						<div class="col-md-9">
						<input type="text" name="last_name" class="form-control">
						<span class="text-danger" ">{{ $errors->has('last_name')?$errors->first('last_name'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Email</label>
						<div class="col-md-9">
						<input type="email" name="email_address" class="form-control">
						<span class="text-danger" ">{{ $errors->has('email_address')?$errors->first('email_address'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Password</label>
						<div class="col-md-9">
						<input type="password" name="password" class="form-control">
						<span class="text-danger" ">{{ $errors->has('password')?$errors->first('password'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Phone Number</label>
						<div class="col-md-9">
						<input type="number" name="phone_number" class="form-control">
						<span class="text-danger" ">{{ $errors->has('phone_number')?$errors->first('phone_number'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="control-label col-md-3">Address</label>
						<div class="col-md-9">
							<textarea class="form-control" name="address" id=""  rows="8" style="resize: none;"></textarea>
							<span class="text-danger" ">{{ $errors->has('address')?$errors->first('address'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-md-9 col-md-offset-3">
						<input type="submit" name="btn" class="btn btn-success btn-block" value="Register">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



<hr/>



@endsection