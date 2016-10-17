@extends('admin.layout')
	@section('title' , 'رأي العميل')
	@section('content')

	<div class="thumbnail">
		{{$testimonials->text}}
	</div>
	<a href="{!!Url('/')!!}/admin/testimonials/{{$testimonials->id}}/toggle" class="btn btn-success">{{($testimonials->status == 0)?'تفعيل':'إلغاء التفعيل'}}</a>
	@endsection
@stop
