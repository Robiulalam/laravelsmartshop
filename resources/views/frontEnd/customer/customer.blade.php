@extends('frontEnd.master')

@section('title')
  Checkout
@endsection


@section('mainContent')
<hr/>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="well">
          Dear {{ Session::get('customer_name') }},
           Your order successfully post. we will contact with you soon...
      </div>
    </div>
  </div>
</div>


@endsection