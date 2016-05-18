<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Request;

class RecordingController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('auth');
	}
    //

     public function index(){
         if(\Auth::user()->accesslevel == '10'){
         $loads = \Illuminate\Support\Facades\DB::select('select * from ctrSubjectOffered where instructorid =?',array(\Auth::user()->username));
         return view('recording/index', compact('loads'));
         }
     }
        
     public function getReset(){
         
         return view('auth/reset');
         
     }
     
     public function postReset(Request $request){
         if($request->password===$request->password_confirmation){
             $user = \Auth::user();
             $user->password = bcrypt($request->password);
             $user->update();
             return view('auth/successful');
         }
         
         return redirect('auth/changepassword')->withErrors("Not Matched");
     }
     
     public function viewgrade($id, $currentsubject){
       
         $loads = \Illuminate\Support\Facades\DB::select('select *  from ctrSubjectOffered where instructorid =?',array(\Auth::user()->username));
         $subjects = \Illuminate\Support\Facades\DB::select("select *  , collegeGradeTB.id as id2 "
                 . "from collegeGradeTB, studentInfo where studentInfo.studentId = collegeGradeTB.studentid AND scheduleid='" . $id . "'"
                 . "order by studentInfo.lastName, studentInfo.firstName ");
         return view('recording/index', compact('loads','subjects','currentsubject'));
         
  
        }
     public function encodegrade($id, $type, $value1){
         $period = [1 => "prelim", 2 => "midterm", 3 => "semifinals", 4 => "finals"];
            \Illuminate\Support\Facades\DB::table('collegeGradeTB')
            ->where('id', $id)
            ->update(array($period[$type] => $value1));
        
         
         return true;
         
     }
        }
    
    
    
    
    

