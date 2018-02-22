<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\shipping;
use App\Order;
use App\Orderdetails;
use App\Payment;
use Cart;
use Session;

class CheckoutController extends Controller
{
   public function index(){
   	return view('frontEnd.checkout.checkoutContent');
   }


   public function newCustomer(Request $request){
   		$customer = new Customer();
   		$customer->first_name = $request->first_name;
   		$customer->last_name = $request->last_name;
   		$customer->email_address = $request->email_address;
   		$customer->password = bcrypt($request->password);
   		$customer->phone_number = $request->phone_number;
   		$customer->address = $request->address;
   		$customer->save();

   		
   		Session::put('customer_id',$customer->id);
   		Session::put('customer_name',$customer->first_name.' '.$customer->last_name);
   		return redirect('/shipping-info');

   }

   public function shippingInfo(){
   		$customer_id = Session::get('customer_id');
   		$customerById = Customer::find($customer_id);
   		return view('frontEnd.checkout.shippingInfo',['customerById'=>$customerById]);
   }

    public function userLogout(){
   		 Session::forget('customer_id');
   		 Session::forget('customer_name');
   		
   		return redirect('/');
   }

   public function newShipping(Request $request){
   		$shipping = new shipping();

   		$shipping->full_name 	 = $request->full_name;
   		$shipping->email_address = $request->email_address;
   		$shipping->phone_number  = $request->phone_number;
   		$shipping->address       = $request->address;
   		$shipping->save();

   		Session::put('shipping_id', $shipping->id);
   		
   		return redirect('/payment-info');
   }


   public function paymentInfo(){
   		
   		
   		return view('frontEnd.checkout.paymentInfo');
   }

   public function userLogin(Request $request){
   		$email_address = $request->email_address;
   		$customerByEmail = Customer::where('email_address', $email_address)->first();
   		$existingPassword = $customerByEmail->password;
   		if (password_verify($request->password, $existingPassword)) {
		    Session::put('customer_id',$customerByEmail->id);
   			Session::put('customer_name',$customerByEmail->first_name.' '.$customerByEmail->last_name);
   			return redirect('/shipping-info');
      		} else {
      		  return redirect('/checkout')->with('message', 'Email or Password is not valid');
      		}
   		
   		// return view('frontEnd.checkout.paymentInfo');
   }


   public function saveOrderInfo(Request $request){
         $paymentType = $request->payment_type;

          $order = new Order();
               $order->customer_id = Session::get('customer_id');
               $order->shipping_id = Session::get('shipping_id');
               // order total ta session er kothay rakha hoice clear na
               $order->order_total = Session::get('orderTotal');
               $order->save();
                Session::put('order_id', $order->id);
 

                $payment = new Payment();
                $payment->order_id = Session::get('order_id');
                $payment->payment_type = $paymentType;
                $payment->save();


               $orderdetails = new Orderdetails();
               $cartProduct = Cart::content();
                foreach ($cartProduct as $cartProduct) {
                     $orderdetails->order_id = Session::get('order_id');
                     $orderdetails->product_id = $cartProduct->id;
                     $orderdetails->product_name = $cartProduct->name;
                     $orderdetails->product_price = $cartProduct->price;
                     $orderdetails->product_quantity = $cartProduct->qty;
                     $orderdetails->save();
                }

         if ($paymentType == 'cash') {

              

             return redirect('/customer-home');
  
            }else if($paymentType == 'paypal'){
                  return 'paypal';
            }else if ($paymentType == 'bkash') {
                  return 'bkash';
            }

   }



   public function customerHome(){
      return view('frontEnd.customer.customer');
   }




}
