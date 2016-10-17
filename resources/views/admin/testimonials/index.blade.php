@extends('admin.layout')
@section('title' , 'أراء العملاء')
@section('content')
	
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading text-center">كل الأراء</div>
		<div class="panel-body">
			@if($testimonials->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>الأسم</th>								
						<th>خيارات</th>								
								
					</tr>
					@foreach($testimonials as $test)
					<tr>
						<td><a href="{!!Url('/')!!}/admin/testimonials/{{$test->id}}" class="btn btn-success">{{ @$user->find($test->user_id)->name }}</a></td>		
						<td>					
							{!! Form::open(['method' => 'DELETE' ,'action'=>['TestimonialsCtrl@destroy',$test->id]]) !!}
								<a href="{!!Url('/')!!}/admin/testimonials/{{$test->id}}/toggle" class="btn btn-success">{{($test->status == 0)?'تفعيل':'إلغاء التفعيل'}}</a>
								{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم الحذف هل انت متأكد ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
					@endforeach
				</table>
				{!!$testimonials->render()!!}
			@else
				<div class="alert alert-info">لا توجد بيانات لعرضها.</div> 
			@endif
		</div>	
	</div>
@endsection
@stop
