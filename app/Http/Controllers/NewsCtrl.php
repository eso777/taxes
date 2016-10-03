<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\News ;
use Validator ;

class NewsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::paginate(20) ;
		return view('admin.news.index' , compact('news')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.news.create') ;
	}

	public function rules($type)
	{
		return [
					'news_title_ar' 	=> 'required',
					'news_title_en'     => 'required',
					'news_content_ar'   => 'required',
					'news_content_en'   => 'required',
					'image' 			=> ($type == 'add')?'required':'',
				];
	}

	
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(),$this->rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		if($request->hasFile('image'))
		{	
			$dest     = 'uploads/back/news/';
			$fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move($dest, $fileName) ;
		}

		// Get Name Image with Ext To save it in a data base ^_^
		$request->merge(['img' => $fileName ]) ;

		$request->merge(['slug_ar'=>$this->make_slug($request->news_title_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->news_title_en)]) ;
              
		news::create($request->all()) ;
		return redirect()->to(Url('/').'/admin/news')->with(['alert'=>'<script>swal(" ", "تم الحفظ بنجاح", "success")</script>']) ;

	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = news::findOrfail($id) ;
		$type 	 = 'edit' ;
		
		return view('admin.news.edit' , compact('news' , 'type')) ;
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
		$data = news::findOrfail($id) ;
		if($request->hasFile('image'))
		{	
			$dest     = 'uploads/back/news/' ;
			$fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move($dest, $fileName) ;

			// Get Name Image with Ext To save it in a data base ^_^
			$request->merge(['img' => $fileName ]) ;
		}
              
              $request->merge(['slug_ar'=>$this->make_slug($request->news_title_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->news_title_en)]) ;
		
		$data->update($request->all()) ;
		return redirect()->to(Url('/').'/admin/news')->with(['alert'=>'<script>swal(" ", "تم حفظ التعديلات", "success")</script>']) ;
	}


	public function destroy($id)
	{
		
		$news = news::find($id);
		if(!$news)
		{
			return redirect()->back()->with(['alert'=>'<script>swal(" ", "تم الحذف من قبل مدير اخر", "success")</script>']);
		}

		$news->delete() ;
		return redirect()->back()->with(['alert'=>'<script>swal(" ", "تم الحذف بنجاح", "success")</script>']);
	}

	// Delete Image
	public function delete_img($id,$image)
	{
		$news = news::findOrFail($id);
		$images =  $news->update(['img' =>'']) ;
		return redirect()->back();
	}

}
