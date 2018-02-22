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
          <h3 class="text-center text-success">Payment from here</h3>
        <hr/>
        <form action="{{ url('/new-order') }}" method="POST">
          {{ csrf_field() }}
          <table class="table">
              <tr>
                  <th>Cash On Delivery</th>
                  <td><input type="radio" name="payment_type" value="cash"></td>
              </tr>

              <tr>
                  <th>Paypal</th>
                  <td><input type="radio" name="payment_type" value="paypal"></td>
              </tr>

              <tr>
                  <th>BKash</th>
                  <td><input type="radio" name="payment_type" value="bkash"></td>
              </tr>

              <tr>
                  
                  <td colspan="2"><input type="submit" name="btn" value="confirm order" class="btn btn-success btn-block"></td>
              </tr>


            </table>
          

        </form>
        
      </div>
    </div>
  </div>
</div>

<hr/>
 


@endsection