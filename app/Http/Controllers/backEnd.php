<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User ;
use App\Consulting ;
use App\Ads ;
use App\Admin ;
use App\News ;
use App\Service ;



class backEnd extends Controller {

	public function index()
	{
            $countUser       = User::all()->Count() ;
            $countConsulting = Consulting::all()->Count() ;
            $countAdmins     = Admin::all()->Count() ;
            $countAds        = Ads::all()->Count();
            $countService    = Service::all()->Count();
            $countNews       = News::all()->Count() ;

		return View('admin.index' ,compact('countUser','countConsulting','countAdmins','countAds','countService','countNews'));
	}
}
