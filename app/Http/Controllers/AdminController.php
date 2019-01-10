<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    }
    //
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function post(){
        $posts=Post::all();
        return view('admin.post',compact('posts'));
    }

    public function comment(){
        $comments=Comment::all();
        return view('admin.comment',compact('comments'));
    }

    public function user(){
        $users=User::all();
        return view('admin.user',compact('users'));
    }

    public function postEdit($id){
        $post=Post::where('id',$id)->first();
        return view('admin.editPost',compact('post'));
    }

    public function postEditPost(CreatePost $request,$id){
        $post=Post::where('id',$id)->first();
        $post->title=$request['title'];
        $post->content=$request['content'];
        $post->save();
        return back()->with('success','Post updated successfully');
    }

    public function postDelete($id){
        $post=Post::where('id',$id)->first();
       $post->delete();
       return \back();

    }

    public function  commentPostDelete($id){
        $comment=Comment::where('id',$id)->first();
       $comment->delete();
       return \back();

    }

    public function userEdit($id){
        $user=User::where('id',$id)->first();
        return view('admin.editUser',compact('user'));
    }

    public function userEditPost(CreatePost $request,$id){
        $user=User::where('id',$id)->first();
        $user->name=$request['name'];
        $user->email=$request['email'];
        if($request['author']==1){
            $user->author=true;
        }elseif($request['admin']==1)
        {
            $user->admin=true;
        }
        $user->save();
        return back()->with('success','User updated successfully');
    }

    public function userDelete($id){
        $user=User::where('id',$id)->first();
       $user->delete();
       return \back();

    }

    public function products(){
        $products=Product::all();
        return view('admin.product',compact('products'));
    }

   public function newProduct(){
        return view('admin.newProduct');
    }

    public function newProductPost(Request $request){
        $this->validate($request,[
            'title'=>'required|string',
            'thumbnail'=>'required|file',
            'description'=>'required',
            'price'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        $product=new Product();
        $product->title=$request['title'];
        $product->description=$request['description'];
        $product->price=$request['price'];
        $file=$request->file('thumbnail');
        $fileName=$file->getClientOriginalName();
        $file->move('product-images',$fileName);
        $product->thumbnail='product-images/'.$fileName;
        $product->save();
        return back();
    }

    public function editProduct($id){
       $product=Product::find($id);
       return view('admin.editProduct',compact('product'));
    }

    public function editProductPost(Request $request,$id){
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        if($request->hasFile('thumbnail')){
            
            $file=$request->file('thumbnail');
            $fileName=$file->getClientOrginalName();
            $file->move('product-images',$fileName);
            $product->thumbnail='product-images/'.$fileName;
        }
        $product->save();
        return back();


        
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        return back();
    }
   
}
