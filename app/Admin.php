<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	protected $table	 = 'admins';
	protected $fillable  = ['name', 'email','password'];
	protected $hidden 	 = ['password', 'remember_token'];

	public static function rules($type ='add',$id = null) 
	{
		return	[
					'name'      => ($type == 'add')?'required':'min:3',
					'email'     => ($type == 'add')?"required|email|unique:admins" : "required|email|unique:admins,email,$id",
					'password' 	=> ($type == 'add')?'required|min:6':'min:6',
				];

	}

	public static function msg()
	{
		return 
				[
					'name.required'   	  =>'يجب ادخال اسم المستخدم ',
					'name.min'	      	  =>'اسم المستخدم يجب ان لا يقل عن 3 احرف',
					'name.unique'     	  =>'اسم المستخدم غير متاح',
					'name.AlphaNum'   	  =>'اسم المستخدم يجب ان بكون احرف',
					'email.required'      =>'يجب ادخال البريد الالكترونى',
					'email.email'         =>'يجب ادخال البريد الالكترونى بطريقة صحيحة',
					'email.unique'        =>' البريد الالكترونى غير متاح',
					'password.required'	  =>'يجب ادخال كلمة المرور',
					'password.min'        =>'كلمة المرور يجب الا تقل عن 6 احرف',
				];

	} 

	/*public static function pre()
	{
		
	}*/

}
