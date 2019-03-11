<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Comment;
use App\Status;
use App\Profile;
use App\Post;
use Auth;

class PostController extends Controller
{
    //
    public function post()
    {
    	$categories = Category::all();
        $statuses = Status::all();
        $profiles = Profile::all();

        return view('posts.post', ['categories' => $categories], ['statuses' => $statuses, 'profiles'=>$profiles]);
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'post_title'=> 'required',
            'post_body'=> 'required',
            'category_id'=> 'required',
            'blood_fimage'=> 'required',
            'phone'=> 'required',
            'status'=> 'required',
        ]);
        $posts = new Post;
        $posts->user_id = Auth::user()->id;
        $posts->category_id = $request->input('category_id');
        $posts->post_title = $request->input('post_title');
        $posts->post_body = $request->input('post_body');
        $posts->status = $request->input('status');
        $posts->phone = $request->input('phone');
        
        
        if(Input::hasFile('blood_fimage')){
            $file = Input::file('blood_fimage');
            $file->move(public_path(). '/posts', $file->getClientOriginalName());
            $url = URL::to("/").'/posts/'. $file->getClientOriginalName();
        
        }

        $posts->blood_fimage = $url;
        $posts->save();
        $profiles = Profile::all();
        return redirect('/home')->
        with('response', 'Request Placed');
    }

    public function view($post_id){
        $posts= Post::where('id', '=' , $post_id)->get();
        $categories = Category::all();
        $comments = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select('users.last_name', 'comments.*')
            ->where(['posts.id' =>$post_id])
            ->get();
        return view('posts.view', ['posts'=>$posts, 'categories'=>$categories, 'comments'=>$comments ]);
    }

    public function edit($post_id){

        $categories = Category::all();
        $posts= Post::find($post_id);
        $category = Category::find($posts->category_id);
        $status = Status::find($posts->status);
        return view('posts.edit', ['category'=>$category,'posts'=>$posts,'categories'=>$categories , 'status'=>$status]);
    }

    public function deletePost($post_id){
        Post::where('id', $post_id)->delete();


     return redirect('/home')->
        with('response', 'Post Deleted Successfully');
    }


    public function category($cat_id){
        $categories = Category::all();
        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id','=','categories.id')
        ->select('posts.*', 'categories.*')
        ->where(['categories.id' =>$cat_id])
        ->get();

        return view('categories.categories', ['categories'=>$categories,'posts'=>$posts] );

    }

    public function comment(Request $request, $post_id){
        $this->validate($request, [
            'comment'=> 'required',
        ]);
        
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->comment = $request->input('comment');
        $comment->save();



        return redirect("/view/{$post_id}")->
        with('response', 'Comment Added Successfully');
    }



}
