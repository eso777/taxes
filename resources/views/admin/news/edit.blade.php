@extends('admin.layout') 
@section('title', 'تعديل بيانات الخبر')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل خبر |{{ $news->news_title_ar }}</div>	
			<div class="panel-body col-md-11">
				{!! Form::model($news, ['action' => ['NewsCtrl@update', $news->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
					@include('admin.news._form',['type'=>'edit' , 'btnName'=>'حفظ التعديلات'])
				{!! Form::close() !!}				
			</div>	
		</div>
	</div>
@endsection

@stop