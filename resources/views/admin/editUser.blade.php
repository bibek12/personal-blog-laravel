@extends('layouts.admin')

@section('title') Editing User @endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Edit Post
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('adminUserEditPost',$user->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input id="normal-input" name="name" class="form-control" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="textarea">Email</label>
                                            <input id="normal-input" name="email" type="email" class="form-control" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Permission</label>
                                            <input type="checkbox" class="form-control" name="author"  value=1 {{$user->author==true?'checked':''}}>Author
                                            <br>
                                            <input type="checkbox" class="form-control" name="admin"  value=1 {{$user->admin==true?'checked':''}}>Admin
                                        </div>
                                    </div>
                                </div>
                    
                            <button type="submit" class="btn btn-success">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection