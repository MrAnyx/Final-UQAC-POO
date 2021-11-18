@extends('layouts.main')
@section('title', "Payment")

@section('head')
   <link rel="stylesheet" href="{{mix('css/cart.css')}}">
@endsection

@section('content')



<div style="width: 1200px; margin: 30px auto 0 auto;">

  <div class="ui ordered fluid steps" style="margin-top: 30px;">
     <div class="completed step">
       <div class="content">
         <div class="title">Summary</div>
         <div class="description">Check if everything is correct</div>
       </div>
     </div>
     <div class="completed step">
       <div class=" content">
         <div class="title">Payment</div>
         <div class="description">Proceed to payment</div>
       </div>
     </div>
     <div class="completed step">
       <div class="content">
         <div class="title">Validation</div>
         <div class="description">Thank you for ordering</div>
       </div>
     </div>
   </div>

   <div class="ui placeholder fluid segment teal blurring" style="margin-top: 40px;" id="payment-validation">

     <div class="ui icon header">
        <i class="check circle outline icon"></i>
        <div style="width: 500px; margin: 15px auto;">
          Thank you for ordering. We hope you will come back soon.
        </div>
     </div>
     <div class="inline">
       <a class="ui button teal" href="{{route('app_home')}}"><i class="shopping cart icon"></i> Back to shopping</a>
     </div>


   </div>

   

</div>

@endsection