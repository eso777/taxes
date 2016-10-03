@extends('admin.layout')
@section('title')
		اضافة مدير 
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">اضافة مدير جديد</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>خطأ!</strong> يوجد بعض المشاكل عند الادخال.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if(Session::has('msg'))
					<div class="alert alert-success">
						تمت الإضافه بنجاح
					</div>
					@endif
					{!! Form::open(['action'=>'AdminsCtrl@store','class'=>'form-horizontal']) !!}
						@include('admin.admins._form',['text'=>'إضافه مدير'])
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
