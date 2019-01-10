@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Laravel Blog</h1>
              <span class="subheading">{{remove_spaces('Personal Blog Powered By Laravel')}}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
          <div class="post-preview">
            <a href="{{Route('singlePost',$post->id)}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <h3 class="post-subtitle">
               {{$post->content}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{$post->user->name}}</a>
              on {{date_format($post->created_at,'F D,Y')}} |
              <i class="fa fa-comment" arial-hidden="true"></i>{{$post->comments->count()}}
            </p>
           </div>
        
          <hr>
          @endforeach
          {{$posts->links()}}
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

@endsection