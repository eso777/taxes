@extends('admin.layout') 
@section('title', 'اضافة أستشارة جديدة')

@section('content')
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة أستشارة جديدة</div>	
			<div class="panel-body">
			
				{!! Form::open([ 'action'=>'ConsultingCtrl@store' , 'files'=>true]) !!}	
					@include('admin.consulting._form',['type'=>'create' , 'btnName'=>'حفظ'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop