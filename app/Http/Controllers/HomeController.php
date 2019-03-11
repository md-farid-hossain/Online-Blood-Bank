<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\Category;
use App\Status;
use App\User;
use App\Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function sortpost(){
        $categories = Category::all();
        $statuses = Status::all();

        return view('posts.post', ['categories' => $categories], ['statuses' => $statuses]);

    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('users.*', 'profiles.*')
                    ->where(['profiles.user_id' => $user_id])
                    ->first();
            $posts = Post::all();
        return view('home', ['profile' => $profile, 'posts'=>$posts]);
    }

    public function myprofile()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('users.*', 'profiles.*')
                    ->where(['profiles.user_id' => $user_id])
                    ->first();
            $posts = Post::all();
        return view('myprofile', ['profile' => $profile], ['posts'=>$posts]);
    }
}
