@extends('layouts.admin')

@section('title')Author Comment @endsection

@section('content')
@extends('layouts.admin')

@section('content')
<div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Author Comments
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach(Auth::user()->comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                       
                                        <td>{{$comment->content}}</td>
                                        <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
</div>
@endSection
@endSection