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
		        Dear {{ Session::get('customer_name') }}, you have to give up product payment information to complete your valuable order.
		      </div>
	    </div>
	</div>



	<div class="row">
		




		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<hr/>
					<h3 class="text-center text-success">Shipping from here</h3>
				<hr/>
				<form class="form-horizontal" action="{{ url('/new-shipping') }}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="full_name" class="control-label col-md-3">Full Name</label>
						<div class="col-md-9">
						<input type="text" value="{{ $customerById->first_name.' '.$customerById->last_name }}"  name="full_name" class="form-control">
						
						</div>
					</div>

					

					<div class="form-group">
						<label for="email_address" class="control-label col-md-3">Email</label>
						<div class="col-md-9">
						<input type="email" value="{{ $customerById->email_address }}" name="email_address" class="form-control">
						<span class="text-danger" ">{{ $errors->has('email_address')?$errors->first('email_address'): '' }} </span>
						</div>
					</div>


					<div class="form-group">
						<label for="phone_number" class="control-label col-md-3">Phone Number</label>
						<div class="col-md-9">
						<input type="number" value="{{ $customerById->phone_number }}" name="phone_number" class="form-control">
						<span class="text-danger" ">{{ $errors->has('phone_number')?$errors->first('phone_number'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						<label for="address" class="control-label col-md-3">Address</label>
						<div class="col-md-9">
							<textarea class="form-control"  name="address" id=""  rows="8" style="resize: none;">{{ $customerById->address }}</textarea>
							<span class="text-danger" ">{{ $errors->has('address')?$errors->first('address'): '' }} </span>
						</div>
					</div>

					<div class="form-group">
						
						<div class="col-md-9 col-md-offset-3">
						<input type="submit" name="btn" class="btn btn-success btn-block" value="Save shipping Info">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



<hr/>



@endsection