<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Msg;
use App\User;
use Auth;
use DB;

class MsgCtrl extends Controller {

     /**
      * Display a listing of the resource.
      *
      * @return Response
      */
     public function index() {
          // Get All user 
          $users = User::all();
          $sub = Msg::orderBy('created_at', 'DESC');
          $messages = DB::table(DB::raw("({$sub->toSql()}) as sub"))
                  ->groupBy('user_id')
                  ->paginate(10);
          $msgs = Msg::all() ; // Get All Messages 
          return view('admin.messages.index', compact('messages', 'users','msgs'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function create() {
          $users = User::where('status', 1)->lists('name', 'id');
          return view('admin.messages.create', compact('users'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @return Response
      */
     public function store(Request $request, $id = 0) {
          
          // All ID's For users .
          ($id == 0) ? $users_id  = $request->users_id : $users_id [] = $id ;
          
          // Make loop to insert multi msgs for multi users Or One User      
          foreach ($users_id as $user_id) {
               $request->merge(['sender' => 0]);
               $request->merge(['admin_id' => Auth::admin()->get()->id]);
               $request->merge(['user_id' => $user_id]);
               // Insert New Record In a data base . 
               Msg::create($request->all());
          }
          if($id == 0)
          {
               return redirect()->to(Url('/') . '/admin/messages')->with(['alert' => '<script>swal(" ", "تم الأرسال بنجاح", "success")</script>']);
          }
          // Return Redirect back 
          return redirect()->back();
     }

     public function getMsgs($id) {
          //dd("SS") ;
          $user = User::findOrFail($id);
          $messages = Msg::where('user_id', $id)->take(100)->get();
           foreach ($messages as $msg) {
            if($msg->sender !== 0){
                     $msg->update(['status'=>1]);
                }
            } 
          //dd($messages) ;
          return View('admin.messages.cnv', compact('user', 'messages'));
     }

}
