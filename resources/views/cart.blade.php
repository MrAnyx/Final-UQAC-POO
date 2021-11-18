@extends('layouts.main')
@section('title', "Cart")

@section('head')
   <link rel="stylesheet" href="{{mix('css/cart.css')}}">
@endsection

@section('content')

<div style="width: 1200px; margin: 30px auto 0 auto;">

   <div class="ui ordered fluid steps" style="margin-top: 30px;">
      <div class="active step">
        <div class="content">
          <div class="title">Summary</div>
          <div class="description">Check if everything is correct</div>
        </div>
      </div>
      <a class="step" href="{{route('app_payment')}}">
        <div class="content">
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


   <div style="display: flex; column-gap: 30px; margin-top: 40px; position: relative;">

      <div class="ui card fluid" style="width: 350px; margin: unset; position: sticky; top: 90px; height: fit-content;">
         <div class="content">
            <div class="header">Order Summary</div>
         </div>
         <div class="content">
            <div class="meta">
               <h4>{{$count}} item(s)</h4>
            </div>
            <div class="ui small feed">
               <div class="ui middle large aligned divided list" style="margin-top: 30px;">
                  <div class="item">
                    <div class="right floated content" style="margin: 4px auto">${{$subtotal}}</div>
                    <div class="content" style="margin: 4px auto">Subtotal</div>
                  </div>
                  <div class="item">
                    <div class="right floated content" style="margin: 4px auto">${{$taxes}}</div>
                    <div class="content" style="margin: 4px auto">Taxes</div>
                  </div>
                  <div class="item">
                    <div class="right floated content" style="font-weight: bold; margin: 4px auto">${{$total}}</div>
                    <div class="content" style="font-weight: bold; margin: 4px auto">TOTAL</div>
                  </div>
                </div>

            </div>
         </div>
         <div class="extra content">
            <a class="ui button fluid teal" href="{{route('app_payment')}}">Pay ${{$total}}</a>
         </div>
      </div>
      <div class="ui card fluid" style="flex: 1; margin: unset;">
         
         <div class="ui divided items">

            @foreach ($items as $item)
               <div class="item" style="padding-left: 1em; padding-right: 1em;">
                  <div class="ui small image" style="border-radius: 5px; overflow: hidden">
                     <img src="{{route('app_displayImage', $item->options->image)}}">
                  </div>
                  <div class="middle aligned content" style="margin-left: 30px;">
                     <div class="item">
                        <div class="right floated content" style="padding-top: 3px; font-weight: 600">${{$item->price}}</div>
                        <div style="font-weight: bold; font-size: 18px;">{{$item->name}}</div>
                     </div>

                     <div class="extra">
                        @foreach ($item->options->departments as $department)
                           <a class="ui label" href="{{route('app_department', ['id' => $department['id']])}}">{{$department["name"]}}</a>
                        @endforeach
                     </div>
                  </div>
                  
                  
               </div>
            @endforeach

          </div>
      
      </div>
      
   </div>
</div>

@endsection