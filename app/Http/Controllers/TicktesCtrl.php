<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket_replay ;
use App\Ticket ;
use App\User ;
use Illuminate\Http\Request;
use DB ;
use Validator ;
use App\Settings ;
use Mail ;
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
        $ticket_replays = Ticket_replay::all() ;
        return view('admin.ticktes.index', compact('users','ticket','ticket_replays'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function post_ticketReplay($id, Request $request)
	{
        $ticket_ = Ticket::findOrFail($id) ;
        //dd($request->all());
        $rules = [
            'content'  => 'required',

        ] ;

        $validation = Validator::make($request->all(),$rules) ;
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput() ;
        }
        $msg = "";
        $files = [];


        if($request->hasFile('attached')) {
            /* $rules['attached'] = 'required|mimes:jpeg,bmp,png,gif,jpg,txt,pdf,doc,docx,zip' ;*/
            $max_size = ini_get('upload_max_filesize');
            $time = time();
            $dest = 'uploads/attachments/';
            $data = "";
            $accepted_files = ['png', 'gif', 'jpeg', 'jpg', 'txt', 'pdf', 'doc', 'docx', 'zip'];

            $i = 0;

            foreach ($request->File('attached') as $one) {

                if(!in_array($one->getClientOriginalExtension(),$accepted_files)){

                    // File Not Allawed .
                    $msg = "صيغة الملف غير مدعومة ، الملفات المرفوضه : " ;
                    $files[$i] = $one->getClientOriginalName();

                }else{
                    if($one->getSize() >= $max_size )
                    {
                        $file_name = $time.'_'.$i.'.'.$one->getClientOriginalExtension();
                        $one->move($dest,$file_name);
                        $data = ($data === "") ? $data .= $file_name : $data .= '|'. $file_name  ;
                    }else {
                        // Size
                        $msg = Lang::get('dashboard.errorMsgUploads');
                        $files[$i] = $one->getClientOriginalName();
                    }
                }
                $i++ ;
            } // End Foreach
            $request->merge(['attach' => $data ]);
        } // End if Has File

        if($msg !== ""){
            return redirect()->back()->with(['msg'=>$msg,'files'=>$files]);
        }


        $request->merge(['ticket_id' => $id]);
        $request->merge(['sender' => 0]);
        $request->merge(['status' => 0 ]);

        //dd($request->all()) ;
        $replay = Ticket_replay::create($request->all()) ;
        $ticket_->update(['status'=>1]) ;

        /* SEnd E-mail */

            $user = User::findOrFail($ticket_->user_id) ;
            $data = [
            'name'   => $user->name ,
            'tic_id' => $ticket_->id ,
            'replay' => $replay->content ,

         ];
        $settings = Settings::first();
        Mail::send('emails.ticket_user', $data, function($message) use($settings,$user,$ticket_) {
            $message->to($user->email, $user->name)->from('no-replay@itage-eg.com','no-replay@itage-eg.com')->subject($ticket_->name);
        });


        /* SEnd E-mail */



        return redirect()->back()->with(['alert' => '<script>swal(" ","تم الـرد بنجـاح", "success")</script>']) ;
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
        Ticket_replay::where('ticket_id',$id)->where('sender',1)->where('status',0)->update(['status'=>1]);

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
