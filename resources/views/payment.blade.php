@extends('layouts.main')
@section('title', "Payment")

@section('head')
   <link rel="stylesheet" href="{{mix('css/cart.css')}}">
@endsection

@section('content')



<div style="width: 1200px; margin: 30px auto 0 auto;">

   <div class="ui ordered fluid steps" style="margin-top: 30px;">
      <a class="completed step" href="{{route('app_cart')}}">
        <div class="content">
          <div class="title">Summary</div>
          <div class="description">Check if everything is correct</div>
        </div>
      </a>
      <a class="active step">
        <div class=" content">
          <div class="title">Payment</div>
          <div class="description">Proceed to payment</div>
        </div>
      </a>
      <div class="disabled step">
        <div class="content">
          <div class="title">Validation</div>
          <div class="description">Thank you for ordering</div>
        </div>
      </div>
    </div>

    <div class="ui placeholder fluid segment teal blurring" style="margin-top: 40px;" id="payment-validation">

      <div class="ui icon header">
         <i class="shopping cart icon"></i>
         <div style="width: 500px; margin: 15px auto;">
           After you have made the payment, your order will be being processed and you will be delivered in a few days.
         </div>
      </div>
      <div class="inline">
        <proceed-payment></proceed-payment>
        <a class="ui button" href="{{route('app_cart')}}"><i class="sign-out icon"></i> Back to summary</a>
      </div>


      <div class="ui dimmer">
        <div class="content">
          <h2 class="ui inverted icon header">
            <i class="check circle outline icon"></i>
            Your order has been validated
          </h2>
        </div>
      </div>
    </div>

    

</div>

@endsection