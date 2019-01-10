<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard(){
        return view('user.dashboard');
    }

    public function newComment(Request $request){
        $comment=new Comment();
        $comment->post_id=$request['post'];
        $comment->user_id=Auth::id();
        $comment->content=$request['comment'];
        $comment->save();
        return back();
      }

    public function deleteComment($id){
        $comment=Comment::where('id',$id)->where('user_id',Auth::id())->delete();
        return back();
    }

    public function profile(){
        return view('user.profile');
    }

    public function profilePost(UserUpdate $request){

        $user=Auth::user();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->save();
        if($request['password']!="")
        {
            if(!(Hash::check($request['password'], Auth::user()->password))){
                return \redirect()->back()->with('error','Your Current Password does not match with current password');
            }

            if(strcmp($request['password'],$request['new_password'])==0){
                return \redirect()->back()->with('error','New password cannot be same as current password');
            }
            
            $validation=$request->validate([
                'password'=>'required',
                'new_password'=>'required|string|min:6|confirmed',
            ]);

            $user->password=\bcrypt($request['new_password']);
            $user->save();
            return redirect()->back()->with('success',"Password Changed Successfully");
        }
      
        return back();
    }                                                                    
}
