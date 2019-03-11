<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doner;
use DB;

class DonerController extends Controller
{
    //
    function index()
    {
     return view('live_search');
    }

    public function create(){
      return view('doner.create');
    }

    public function store(Request $request){

      $this->validate($request,[
        'name'=> 'required',
        'blood_group'=> 'required',
        'status'=> 'required',
        'phone'=> 'required',
        'email'=> 'required',
        'division'=> 'required',
        'district'=> 'required',
      ]);

      $name = $request->name;
      $blood_group = $request->blood_group;
      $status = $request->status;
      $phone = $request->phone;
      $email = $request->email; 
      $division = $request->division;
      $district = $request->district;

      Doner::create([
        'name' => $name,
        'blood_group' => $blood_group,
        'status' => $status,
        'phone' => $phone,
        'email' => $email,
        'division' => $division,
        'district' => $district,
      ]);

      return redirect()->back();
      
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('doners')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('blood_group', 'like', '%'.$query.'%')
         ->orWhere('phone', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('division', 'like', '%'.$query.'%')
         ->orWhere('district', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('doners')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->blood_group.'</td>
         <td>'.$row->phone.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->division.'</td>
         <td>'.$row->district.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
