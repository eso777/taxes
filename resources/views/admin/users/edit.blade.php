@extends('admin.layout')
@section('title' , 'تعديل العضو')
		
@section('content')

	<div class="col-md-12">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel panel-heading text-center	">تعديل بيانات المستخدم : ( {{ $user->name }} )</div>
				<div class="panel-body col-md-10">
					{!! Form::model($user ,['method'=>'PATCH','action'=>['UsersCtrl@update',$user->id],'files'=>true])!!}
						@include('admin.users._form',['btnName'=>'حفظ', 'alert'=>'<small class="text-warning">Leave Blank to keep it</small>','type'=>'edit'])
					{!!  Form::close() !!}
				</div>
			</div>
			<hr>
		</div>		
	</div>

@endsection
@stop