<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    //
    public function status()
    {
        return view('statuses.status');
    }

    public function addStatus(Request $request){
    	$this->validate($request, [
    		'status' => 'required'
    	]);
    	$status = new Status;
    	$status->status=$request->input('status');
    	$status->save();
    	return redirect('/status')->with('response', 'Status Added Successfully');
    }
}
