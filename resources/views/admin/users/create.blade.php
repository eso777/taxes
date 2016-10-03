@extends('admin.layout')
@section('title','اضافة عضو جديد')
	
@section('content')
	
	<div class="col-md-12">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel panel-heading text-center	">أضافة عضو جديد</div>
				<div class="panel-body col-md-10">
					{!! Form::open(['action'=>'UsersCtrl@store','class'=>'form-horizontal']) !!}
						@include('admin.users._form',['btnName'=>'إضافه'])
					{!! Form::close() !!}
				</div>
			</div>
			<hr>
		</div>		
	</div>
@endsection
@stop