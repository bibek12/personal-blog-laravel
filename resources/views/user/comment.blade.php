@extends('layouts.admin')

@section('content')
<div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            User Comments
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach(Auth::user()->comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td class="text-nowrap">{{$comment->post->title}}</td>
                                        <td>{{$comment->content}}</td>
                                        <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <form id="deleteComment" action="{{route('deleteComment',$comment->id)}}" method="post">@csrf</form>
                                            <button class="btn btn-danger" onclick="document.getElementById('deleteComment').submit()">Delete</button>
                                        </td>
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