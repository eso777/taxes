<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Settings;
use Illuminate\Http\Request;
use App\Msg ;
use App\Admin ;
use Auth ;
use App\User ;
use App\Testimonials ;
use Lang ;
use Validator ;
use App\Ticket ;
use App\Ticket_replay ;
use Mail ;
class DashboardCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View('front.dashboard.index');
	}

    public function msgs()
    {
        $msgs_unread = Msg::where('user_id',Auth::client()->get()->id)->where('sender',0)->get() ;
        foreach ($msgs_unread as $read)
        {
            $read->update(['status'=>1]) ;
        }
        $msgs = Msg::where('user_id',Auth::client()->get()->id)->take(500)->get();
        return View('front.dashboard.messages.index',compact('msgs'));
    }

    public function msgsSend(Request $request)
    {
        $admin = Admin::first();
        $request->merge(['admin_id'=>$admin]);
        $request->merge(['user_id'=>Auth::client()->get()->id]);
        $request->merge(['sender'=>1]);
        Msg::create($request->all());
        return redirect()->back();
    }

    public function editProfile()
    {
        $user = User::findOrFail(Auth::client()->get()->id);
        $type = 'edit' ;
        return View('front.dashboard.profile.index',compact('user','type'));
    }

    public function postProfile(Request $request)
    {
        $user = User::findOrFail(Auth::client()->get()->id);
        $validator =  Validator::make($request->all(), [
            'email'  => 'required|email',
            'mobile' => 'required|numeric',
            'field'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }else{
            if($request->hasFile('img')){
                $time = time();
                $dest = 'uploads/users/';
                $file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
                $request->file('img')->move($dest,$file_name);
                $request->merge(['image'=>$file_name]);
            }

            if($request->has('pwd')){
                $request->merge(['password'=>bcrypt($request->password)]);
            }

            $user->update($request->all());
            return redirect()->back()->with(['msg'=>Lang::get('dashboard.saved_success')]);
        }

    }

    public function new_testimonial()
    {
        return View('front.dashboard.testimonials.index');
    }

    public function post_testimonial(Request $request)
    {
        $rules = [
            'text' 	=> 'required',
        ] ;

        $validation = Validator::make($request->all(),$rules) ;
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput() ;
        }

        $request->merge(['user_id'=>Auth::client()->get()->id]);
        Testimonials::create($request->all());
        return redirect()->back()->with(['msg'=>Lang::get('dashboard.submit_success')]);

    }

    /*  Tickets */
    function new_ticket()
    {
       $max_size =  ini_get('upload_max_filesize');
       return view('front.dashboard.tickets.index',compact('max_size')) ;
    }

    function post_ticket(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name' 	   => 'required',
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
                    $msg = Lang::get('dashboard.fileNotAllowed') ;
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

        $request->merge(['name'    => $request->name]);
        $request->merge(['user_id' => Auth::client()->get()->id]);
        $request->merge(['status'  => 1]);
        $request->merge(['ip_user' => $request->ip()]);


        $ticket = Ticket::create($request->all()) ;
        $request->merge(['ticket_id' => $ticket->id]);
        $request->merge(['sender' => 1]);
        $request->merge(['status'    => 0 ]);
        //dd($request->all()) ;
        $replay = Ticket_replay::create($request->all()) ;

        /* SEnd E-mail */
            $settings = Settings::first();
            $data = [
                'name' => Auth::client()->get()->name ,
                'ticket_name' => $ticket->name,
                'ticket_id' => $ticket->id,
                'replay' => $replay->content,

            ];
            Mail::send('emails.ticket_admin', $data, function($message) use($settings,$ticket) {
                $message->to($settings->email, 'Admin')->from('no-replay@itage-eg.com','no-replay@itage-eg.com')->subject($ticket->name);
            });
        /* SEnd E-mail */


        return redirect()->to(Url('/').'/dashboard/')->with(['msg_succ'=>Lang::get('dashboard.msg_succ')]) ;
    }

    /*******************************************************************/

    function getTickets()
    {
        $tickets = Ticket::where('user_id',Auth::client()->get()->id)->paginate(20);

        return view('front.dashboard.tickets.all' , compact('tickets')) ;
    }

    function show_ticket($id)
    {

        $tickets = Ticket::findOrFail($id);
        if($tickets->user_id !== Auth::client()->get()->id)
        {
            return redirect()->to(Url('/').'/dashboard/tickets') ;
        }
        $ticketDetails = Ticket_replay::where('ticket_id',$tickets->id)->latest('created_at')->get();
        Ticket_replay::where('ticket_id',$tickets->id)->where('sender',0)->update(['status'=>1]);
        return view('front.dashboard.tickets.ticket_replay' , compact('ticketDetails','tickets')) ;

    }

    function ticket_replay($id , Request $request)
    {

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
                    $msg = Lang::get('dashboard.fileNotAllowed') ;
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
        $request->merge(['sender' => 1]);
        $request->merge(['status'    => 0 ]);
        $replay = Ticket_replay::create($request->all()) ;
        $ticket = Ticket::findOrFail($id);


        /* SEnd E-mail */
        $settings = Settings::first();
        $data = [
            'name' => Auth::client()->get()->name ,
            'ticket_name' => $ticket->name,
            'ticket_id' => $ticket->id,
            'replay' => $replay->content,

        ];
        Mail::send('emails.ticket_admin', $data, function($message) use($settings,$ticket) {
            $message->to($settings->email, 'Admin')->from('no-replay@itage-eg.com','no-replay@itage-eg.com')->subject($ticket->name);
        });
        /* SEnd E-mail */


        return redirect()->back()->with(['']);

    }


    public function downloadFiles($file)
    {

        return response()->download(public_path('uploads/attachments/'.$file));
    }
    /*  Tickets */


}

