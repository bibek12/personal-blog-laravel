@extends('layouts.admin')

@section('title') Admin Post @endsection

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
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Comments</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td class="text-nowrap">{{$post->title}}</td>
                                        <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                                        <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                                        <td class="text-nowrap">{{$post->comments->count()}}</td>
                                        <td>
                                           <a href="{{route('adminPostEdit',$post->id)}}" class="btn-warning">Edit</a>
                                           <form id="deletePost-{{$post->id}}" action="{{route('adminPostDelete',$post->id)}}" method="post">@csrf</form>
                                            <button class="btn btn-danger" onclick="document.getElementById('deletePost-{{$post->id}}').submit()">Delete</button>
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