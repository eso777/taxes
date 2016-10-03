<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\AboutCompany ;

class aboutCompCtrl extends Controller {

	public function index()
	{
        $info = AboutCompany::first();
        return view('admin.aboutCompany' ,compact('info'));
	}
          
	public function update($id , Request $request)
	{
		$info = AboutCompany::findOrFail($id) ;
		if($request->hasFile('image'))
		{
			$time = time();
			$i = 1 ;
			$filename = $info->imgs;
			
			foreach ($request->file('image') as $file) {
				$dest 		= 'uploads/back/aboutCompany/' ;
				$file_name = $time."_$i.".$file->getClientOriginalExtension();
				$file->move($dest,$file_name);
				($filename == "") ? $filename .= $file_name : $filename .= '|'.$file_name ;
				$i++ ;
			}
			$request->merge(['imgs'=>$filename]);
		}else
		{
			$request->merge(['imgs'=>$info->imgs]) ;
		}
		// Update Info
		$info->update($request->all()) ;

		return redirect()->back()->with(['alert'=>'<script>swal(" ", "تم حفظ التعديلات", "success")</script>']);
	}

	public function delete_img($name)
	{
		$info = AboutCompany::first() ;
		$exp = explode('|',$info->imgs) ;
		foreach ($exp as $key  => $value) {
			if($name == $value){ unset($exp[$key]) ;} 
		}
		$info->update(['imgs'=> implode('|', $exp) ]) ;
		return redirect()->back(); 
	}

}
