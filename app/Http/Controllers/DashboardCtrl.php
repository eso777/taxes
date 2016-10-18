<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Msg ;
use App\Admin ;
use Auth ;
use App\User ;
use App\Testimonials ;
use Lang ;
use Validator ;
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

       //     dd($request->all()) ;
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

}

