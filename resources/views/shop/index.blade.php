@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Bibek Shop</h1>
              <span class="subheading">Best Shop For T-Shirt</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($products as $product)
          <div class="post-preview">
            <div class="row">
              <div class="col-md-4">
                  <img src="{{asset($product->thumbnail)}}" width=200 height=200 alt="">
              </div>
              <div class="col-md-8">
              <a href="{{Route('shop.singleProduct',$product->id)}}">
                  <h2 class="post-title">
                  {{$product->title}}
                  </h2>
                  
             </a>
            <p class="post-meta">Posted by
              on {{date_format($product->created_at,'F D,Y')}} |
            </p>
           </div>
        
          
              </div>

            </div>
         <hr>
          @endforeach
          <!-- Pager -->
          
        </div>
      </div>
    </div>
@endsection