@extends('layouts.admin')

@section('title')Admin User @endsection

@section('content')
<div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Admin User
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Post</th>
                                        <th>Comment</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-nowrap">{{$user->posts->count()}}</td>
                                        <td>{{$user->comments->count()}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('adminUserEdit',$user->id)}}" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
                                            <form style="display:none" id="deleteComment-{{$user->id}}" action="{{route('adminUserDelete',$user->id)}}" method="post">@csrf</form>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal-{{$user->id}}">Delete</button>
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
@foreach($users as $user)
<div class="modal" tabindex="-1" role="dialog" id="deleteUserModal-{{$user->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">You are about to delete{{$user->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are You sure ?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No Keep It</button>
      <form id="deleteComment-{{$user->id}}" action="{{route('adminUserDelete',$user->id)}}" method="post">@csrf
          <button type="submit" class="btn btn-primary">Yes Delete It</button>
       </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endSection