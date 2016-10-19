<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket_replay ;
use App\Ticket ;
use App\User ;
use Illuminate\Http\Request;
use DB ;
use Validator ;
class TicktesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $ticket = Ticket::latest('created_at')->paginate(20) ;
        $users  = User::all() ;
        return view('admin.ticktes.index', compact('users','ticket'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function post_ticketReplay($id, Request $request)
	{
//        //dd($request->all());
//        $rules = [
//            'content'  => 'required',
//
//        ] ;
//
//        $validation = Validator::make($request->all(),$rules) ;
//        if($validation->fails())
//        {
//            return redirect()->back()->withErrors($validation)->withInput() ;
//        }
//        $msg = "";
//        $files = [];
//
//
//        if($request->hasFile('attached')) {
//            /* $rules['attached'] = 'required|mimes:jpeg,bmp,png,gif,jpg,txt,pdf,doc,docx,zip' ;*/
//            $max_size = ini_get('upload_max_filesize');
//            $time = time();
//            $dest = 'uploads/attachments/';
//            $data = "";
//            $accepted_files = ['png', 'gif', 'jpeg', 'jpg', 'txt', 'pdf', 'doc', 'docx', 'zip'];
//
//            $i = 0;
//
//            foreach ($request->File('attached') as $one) {
//
//                if(!in_array($one->getClientOriginalExtension(),$accepted_files)){
//
//                    // File Not Allawed .
//                    $msg = Lang::get('dashboard.fileNotAllowed') ;
//                    $files[$i] = $one->getClientOriginalName();
//
//                }else{
//                    if($one->getSize() >= $max_size )
//                    {
//                        $file_name = $time.'_'.$i.'.'.$one->getClientOriginalExtension();
//                        $one->move($dest,$file_name);
//                        $data = ($data === "") ? $data .= $file_name : $data .= '|'. $file_name  ;
//                    }else {
//                        // Size
//                        $msg = Lang::get('dashboard.errorMsgUploads');
//                        $files[$i] = $one->getClientOriginalName();
//                    }
//                }
//                $i++ ;
//            } // End Foreach
//            $request->merge(['attach' => $data ]);
//        } // End if Has File
//
//        if($msg !== ""){
//            return redirect()->back()->with(['msg'=>$msg,'files'=>$files]);
//        }
//
//        /*$request->merge(['name'    => $request->name]);
//        $request->merge(['user_id' => Auth::client()->get()->id]);
//        $request->merge(['status'  => 1]);
//        $request->merge(['ip_user' => $request->ip()]);*/
//
//
//        $request->merge(['ticket_id' => $id]);
//        $request->merge(['sender' => 0]);
//        $request->merge(['status' => 0 ]);
//        dd($request->all()) ;
//        Ticket_replay::create($request->all()) ;
//
//        return redirect()->to(Url('/').'/dashboard/')->with(['msg_succ'=>Lang::get('dashboard.msg_succ')]) ;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	    $ticket = Ticket::findOrFail($id);
	    $ticket_replay = Ticket_replay::where('ticket_id',$id)->latest('created_at')->get();

        foreach ($ticket_replay as $one)
        {
            $one->update(['status' => 1]) ;
        }

		return view('admin.ticktes.show' ,compact('ticket','ticket_replay')) ;
	}



	public function switchCase($id)
	{
        $tic = Ticket::findOrFail($id) ;
        if($tic->status == 1){
            $tic->update(['status'=>0]);
        }else
            $tic->update(['status'=>1]);

        return redirect()->back() ;
	}

}
