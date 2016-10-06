@extends('admin.layout') 
@section('title', 'تعديل محتوي الإستشارة')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل الإستشارة |{{ $consulting->title_ar }}</div>	
			<div class="panel-body col-md-11">
				{!! Form::model($consulting, ['action' => ['ConsultingCtrl@update', $consulting->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
					@include('admin.consulting._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات'])
				{!! Form::close() !!}				
			</div>	
		</div>
	</div>
@endsection

@stop