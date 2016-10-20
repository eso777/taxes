<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Testimonials;
use App\User;
class TestimonialsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user  = User::all();
		$testimonials = Testimonials::paginate(20);
		return View('admin.testimonials.index',compact('testimonials','user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function toggle($id)
	{
		$testimonials = Testimonials::findOrFail($id);
		if($testimonials->status == 0){
			$testimonials->update(['status'=>1]);
		}else{
			$testimonials->update(['status'=>0]);
		}
		return redirect()->back();

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$testimonials = Testimonials::findOrFail($id);
		return View('admin.testimonials.one',compact('testimonials'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$testimonials = Testimonials::findOrFail($id);
		$testimonials->delete();
		return redirect()->back();
		
	}

}
