<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:author');
        $this->middleware('auth');
    }
    //
    public function dashboard(){
       $post= Post::where('user_id' ,Auth::id())->pluck('id')->toArray();
       $allComment=Comment::whereIn('post_id',$post)->get();
       $todayComment=$allComment->where('created_at','>=',\Carbon\Carbon::today())->count();
        return view('author.dashboard',compact('allComment','todayComment'));
    }

    public function post(){
        return view('author.post');
    }

    public function comment(){
        $post=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments=Comment::whereIn('post_id',$post)->get();
        return view('author.comment',compact('comments'));
    }

    public function newPost(){
        //$newPost=new Post();

        return view('author.newPost');
    }
    public function createPost(CreatePost $request){
        $post=new Post();
        $post->title=$request['title'];
        $post->content=$request['content'];
        $post->user_id=Auth::id();
        $post->save();
        return back()->with('success','Post is successfully created.');
    }

    public function postEdit($id){
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        return view('author.postEdit',compact('post'));
    }

    public function postEditPost(CreatePost $request,$id){
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        $post->title=$request['title'];
        $post->content=$request['content'];
        $post->save();
        return back()->with('success','Post updated successfully');
    }

    public function postDelete($id){
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
       $post->delete();
       return \back();
    }
}
