<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Consulting ;
use Validator ;

class ConsultingCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$consulting = Consulting::latest('created_at')->paginate(20) ;
		return view('admin.consulting.index' , compact('consulting')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
          return view('admin.consulting.create') ;
	}
       
       public function rules()
	{
          return [
                    'title_ar'     => 'required',
                    'title_en'     => 'required',
                    'content_ar'   => 'required',
                    'content_en'   => 'required',
                ];
	}
       
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
          $validation = Validator::make($request->all(),$this->rules()) ;
          if($validation->fails())
          {
                 return redirect()->back()->withErrors($validation)->withInput() ;
          }
          
          $request->merge(['slug_ar'=>$this->make_slug($request->title_ar)]);		
          $request->merge(['slug_en'=>$this->make_slug($request->title_en)]) ;

          Consulting::create($request->all()) ;
          return redirect()->to(Url('/').'/admin/consulting')->with(['alert'=>'<script>swal(" ", "تم الحفظ بنجاح", "success")</script>']) ;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
          $consulting = Consulting::findOrFail($id) ;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$consulting = Consulting::findOrfail($id) ;
		$type 	 = 'edit' ;
		
		return view('admin.consulting.edit' , compact('consulting' , 'type')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
          $validation = Validator::make($request->all(),$this->rules()) ;
          if($validation->fails())
          {
                 return redirect()->back()->withErrors($validation)->withInput() ;
          }  
          // Get Old Data To update it
          $data = Consulting::findOrfail($id) ;
          
          $request->merge(['slug_ar'=>$this->make_slug($request->title_ar)]);		
          $request->merge(['slug_en'=>$this->make_slug($request->title_en)]) ;
              
          $data->update($request->all()) ;
          return redirect()->to(Url('/').'/admin/consulting')->with(['alert'=>'<script>swal(" ", "تم حفظ التعديلات", "success")</script>']) ;
          
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
          $consulting = Consulting::find($id);
          if(!$consulting)
          {
               return redirect()->to(Url('/').'/admin/consulting')->with(['alert'=>'<script>swal(" ", "تم الحذف من قبل مدير اخر", "success")</script>']);
          }
          $consulting->delete() ;
          return redirect()->to(Url('/').'/admin/consulting')->with(['alert'=>'<script>swal(" ", "تم الحذف بنجاح", "success")</script>']);
	}

}
