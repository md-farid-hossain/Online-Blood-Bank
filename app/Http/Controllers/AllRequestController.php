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

class AllRequestController extends Controller
{
    public function post()
    {
    	$categories = Category::all();
        $statuses = Status::all();
        $profiles = Profile::all();
        $posts = Post::paginate(5);
        return view('allrequest', ['categories' => $categories, 'statuses' => $statuses, 'profiles'=>$profiles, 'posts'=>$posts]);
    }

    //start
    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('posts')
         ->where('post_title', 'like', '%'.$query.'%')
         ->orWhere('post_body', 'like', '%'.$query.'%')
         ->orWhere('category_id', 'like', '%'.$query.'%')
         ->orWhere('status', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('post')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();

      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    //end


}
