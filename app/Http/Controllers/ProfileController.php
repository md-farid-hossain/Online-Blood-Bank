<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use App\Category;
use App\Status;
use Auth;

class ProfileController extends Controller
{
    //


    public function updateprofile()
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('profiles.updateprofile', ['categories' => $categories,'statuses' => $statuses]);
    }


    public function addProfile(Request $request)
    {
    	$this->validate($request,[
    		'category_id'=> 'required',
            'status'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
    		'profile_pic'=> 'required',
    	]); 

    	$profiles = new profile;
        $profiles->user_id = Auth::user()->id;
    	$profiles->full_name = Auth::user()->last_name;
        $profiles->email = Auth::user()->email;
    	$profiles->category_id = $request->input('category_id');
        $profiles->status = $request->input('status');
        $profiles->phone = $request->input('phone');
        $profiles->address = $request->input('address');
    	if(Input::hasFile('profile_pic')){
    		$file = Input::file('profile_pic');
$file->move(public_path(). '/uploads', $file->getClientOriginalName());
$url = URL::to("/").'/uploads/'. $file->getClientOriginalName();
		
    	}
    	$profiles->profile_pic = $url;
    	$profiles->save();
    	return redirect('/myprofile')->
    	with('response', 'Profile Updated Successfully');

    }


}
