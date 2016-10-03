<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class backEnd extends Controller {

	public function index()
	{
		return View('admin.index');
	}
}
