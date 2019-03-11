<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use DB;
class CommunityController extends Controller
{
    //

    function index()
    {
      $data = DB::table('blood_bank_info')->paginate(5);
     return view('community', compact('data'));
     
    }

    function action(Request $request)
    {
     if($request->ajax())
     {

      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = DB::table('posts')->paginate(5);
       $data = DB::table('blood_bank_info')
         ->where('organization', 'like', '%'.$query.'%')
         ->orWhere('location', 'like', '%'.$query.'%')
         ->orWhere('contack', 'like', '%'.$query.'%')
         ->orWhere('other_info', 'like', '%'.$query.'%')
         ->orderBy('id', 'asc')
         ->get();
         
      }
      else
      {
       $data = DB::table('blood_bank_info')
         ->orderBy('id', 'asc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->organization.'</td>
         <td>'.$row->location.'</td>
         <td>'.$row->contack.'</td>
         <td>'.$row->other_info.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Blood Bank Found</td>
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
