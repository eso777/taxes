@extends('admin.layout') 
@section('title', 'تعديل بيانات الخدمة')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل خدمة |{{ $service->title_ar }}</div>	
			<div class="panel-body col-md-11">
				{!! Form::model($service, ['action' => ['ServicesCtrl@update', $service->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
					@include('admin.services._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات'])
				{!! Form::close() !!}				
			</div>	
		</div>
	</div>
@endsection

@stop