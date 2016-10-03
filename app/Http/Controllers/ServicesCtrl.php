<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service ;
use Validator ;

class ServicesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = Service::paginate(20) ;
		return view('admin.services.index' , compact('services')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.services.create') ;
	}

	public function rules($type)
	{
		return [
					'title_ar'     => 'required',
					'title_en'     => 'required',
					'content_ar'   => 'required',
					'content_en'   => 'required',
					'image'        => ($type == 'add')?'required':'',
				];
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(),$this->rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		if($request->hasFile('image'))
		{	

			$dest     = 'uploads/back/services/' ;
			$fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move($dest, $fileName) ;
		}

		// Get Name Image with Ext To save it in a data base ^_^
		$request->merge(['img' => $fileName ]) ;
              
              $request->merge(['slug_ar'=>$this->make_slug($request->title_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->title_en)]) ;
              
		/*dd($request->all()) ;*/
		Service::create($request->all()) ;
		return redirect()->to(Url('/').'/admin/services')->with(['alert'=>'<script>swal(" ", "تم الحفظ بنجاح", "success")</script>']) ;


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = Service::findOrfail($id) ;
		$type 	 = 'edit' ;
		
		return view('admin.services.edit' , compact('service' , 'type')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request ,$id)
	{
		$validation = Validator::make($request->all(),$this->rules('edit')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		// Get Old Data To update it
		$data = Service::findOrfail($id) ;
		if($request->hasFile('image'))
		{	
			$dest     = 'uploads/back/services/' ;
			$fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move($dest, $fileName) ;

			// Get Name Image with Ext To save it in a data base ^_^
			$request->merge(['img' => $fileName ]) ;
		}

		$request->merge(['slug_ar'=>$this->make_slug($request->title_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->title_en)]) ;
              
		$data->update($request->all()) ;
		return redirect()->to(Url('/').'/admin/services')->with(['alert'=>'<script>swal(" ", "تم حفظ التعديلات", "success")</script>']) ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$service = Service::find($id);
		if(!$service)
		{
			return redirect()->to(Url('/').'/admin/services')->with(['alert'=>'<script>swal(" ", "تم الحذف من قبل مدير اخر", "success")</script>']);
		}

		$service->delete() ;
		return redirect()->to(Url('/').'/admin/services')->with(['alert'=>'<script>swal(" ", "تم الحذف بنجاح", "success")</script>']);
	}

	// Delete Image
	public function delete_img($id,$image)
	{
		$service = Service::findOrFail($id);
		$images =  $service->update(['img' =>'']) ;
		return redirect()->back();
	}

}
