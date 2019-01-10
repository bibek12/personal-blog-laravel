@extends('layouts.admin')

@section('title')Admin Comment @endsection

@section('content')
<div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Admin Comments
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
                                     @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td class="text-nowrap">{{$comment->post->title}}</td>
                                        <td>{{$comment->content}}</td>
                                        <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <form id="deleteComment-{{$comment->id}}" action="{{route('adminCommentPostDelete',$comment->id)}}" method="post">@csrf</form>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteComment-{{$comment->id}}">Delete</button>
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
<!--
    Modal
-->
@foreach($comments as $comment)
<div class="modal fade" id="commentDelete-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are You About To Delete {{$comment->post->title}}</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <form id="deleteComment-{{$comment->id}}" action="{{route('adminCommentPostDelete',$comment->id)}}" method="post">@csrf
                <button type="button" class="btn btn-primary">Delete</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endSection