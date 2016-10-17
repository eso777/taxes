<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Validator ;

class UsersCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{	
		$query = User::latest('created_at');
		if($request->has('q'))
		{	
			$request->merge(['q'=>trim($request->q)]);
			$query->where('name','like','%'.$request->q.'%')->orwhere('email','like','%'.$request->q.'%')->orwhere('name_company','like','%'.$request->q.'%');
		}
		//dd($request->all()) ;
		$users 	        = $query->paginate(30);
		$usersCount     = User::all()->count(); 
		$usersActive    = User::where('status',1)->count(); 
		$usersDisActive = User::where('status',0)->count(); 
		return view('admin.users.index',compact('users','request','usersActive','usersDisActive','usersCount')) ;
	}


	/*public function jsonData()
	{
		$users = User::get();
		return response()->json($users);
		return $users->toJson();
	}*/

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin.users.create');
	}

	/**
	 * This Function To Make rules for validation form add and edit ^_^
	 *
	 * @return Array key and value .
	 */
	private function rules($type , $id = null){
		/* Make rules inputs by type parameter with ID */
		return [
					'name'     => ($type == 'add')?'required|unique:users':"required|unique:users,name,$id",
                    'name_company'     => 'required',
					'img'     => 'required',
					'email'    => ($type == 'add')?'required|email|unique:users':"required|email|unique:users,email,$id",
					'mobile'   => 'required|min:11|numeric',
					'password' => ($type == 'add')?'required':'',
					'field'    => 'required',
				];

	}

	public function store(Request $request)
	{	

		$validation = Validator::make($request->all(),$this->rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

        if($request->hasFile('img')){
            $time = time();
            $dest = 'uploads/users/';
            $file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->move($dest,$file_name);
            $request->merge(['image'=>$file_name]);
        }

		/*dd($request->all()) ;*/
		$request->merge(['password'=>bcrypt($request->password)]);
		$request->merge(['status'=> 1 ]);
		$user =  User::create($request->all());
		return redirect()->to(Url('/').'/admin/users')->with(['alert'=>'<script>swal(" ", "تم الحفظ بنجاح", "success")</script>']);			
	
	}

	/**
	 **
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return View('admin.users.edit',compact('user'));
	}


	public function show($id)
	{
		$user = User::findOrFail($id);
		return View('admin.users.show',compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{	
		$validation = Validator::make($request->all(),$this->rules('edit',$id)) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		$user = User::findOrFail($id);
        if($request->hasFile('img')){
            $time = time();
            $dest = 'uploads/users/';
            $file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->move($dest,$file_name);
            $request->merge(['image'=>$file_name]);
        }

        if($request->password !== "")
		{
			$request->merge(['password'=>bcrypt($request->password)]);
		}else{
			$request->merge(['password'=>$user->password]);
		}

		$user->update($request->all());
		return redirect()->to(Url('/').'/admin/users')->with(['alert'=>'<script>swal(" ", "تم حفظ التعديلات", "success")</script>']);			
			
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*public function destroy($id)
	{
		User::findOrFail($id)->delete();
		return redirect()->to('admin/users')->with(['alert'=>'<script>swal(" ", "تم الحذف بنجاح", "success")</script>']);			
		
	}*/

	public function sendMsg(Request $request)
	{
		//dd($request->selected) ;
		//(!$request->selected) ? $users = User::all() : 	$users = $request->selected ;
		//dd($users) ;
		$type = 'all' ;
		if($type == 'all') 
		{
			$users = User::where('status',1)->get();		
		}else
		{
			$users = User::where('status',1)->lists('name','id') ;
		}
		return view('admin.messages.create' , compact('users', 'type'));
	}


	/* 
		* Start Function Status User .
		* This Function will be active user and disactive users by id 
		** Change Value Status from 0 => disabled to 1 to active .  
 	 */
	public function statusUser($id)
	{
		$status = User::findOrFail($id) ;

		($status->status == 0) ? $status->update(['status' => 1]) : $status->update(['status' => 0]);
		//dd($status->status) ;
		return redirect()->to(Url('/').'/admin/users')->with(['alert'=>'<script>swal(" ", "تمت العملية بنجاح", "success")</script>']) ;
	}	
	
}
