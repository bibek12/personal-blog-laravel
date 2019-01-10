@extends('layouts.master')

@section('content')
  <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('assets/img/home-bg.jpg')}})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{$product->title}}</h1>
             </div>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="row">
          <div class="col-md-5">
              <img src="{{asset($product->thumbnail)}}" width=350 height=300 alt="">
          </div>
          <div class="col-md-7">
              <h2>{{$product->title}}</h2>
              <hr>
              {{$product->description}}
              <hr>
              <b>$ {{$product->price}}</b>
              <hr>
              <a href="" class="btn btn-primary">CheckOut with PayPal</a>
          </div>
      </div>
    </div>
   
    
 @endsection
