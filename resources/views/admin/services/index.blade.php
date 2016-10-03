@extends('admin.layout')
@section('title' , 'الخدمات')

@section('content')
<a href="{!!Url('/')!!}/admin/services/create" class="btn btn-success" title="أضافة خدمة جديدة">
	<i class="fa fa-plus"></i></a>
<br>
<br>


@if(Session::has('msg'))
	<div class="alert alert-success">
		{!! Session::get('msg') !!}
	</div>
@endif

@if(Session::has('alert'))
		{!! Session::get('alert') !!}
@endif
	
@if($services->total() > 0 )
	<div class="panel panel-primary">
		<div class="text-center panel-heading">الخدمات</div>
		<table class="table table-responsive table-striped">
		<thead>
			<th>#</th>
			<th>اسم الخدمة العربي</th>
			<th>اسم الخدمة الأنجليزي</th>
			<th colspan="4">خيارات</th>
		</thead>
		<tbody>
			@foreach($services as $service)
			<tr>
				<td>{{ $service->id }}</td>
				<td>{{ $service->title_ar }}</td>
				<td>{{ $service->title_en }}</td>
				
				<td>
					<a href="{{ Url('/') }}/admin/services/{{ $service->id }}/edit" class="btn btn-warning"> تعديل </a>
				</td>
				
				<td>
					{!! Form::open(['method'=>'DELETE','action' =>['ServicesCtrl@destroy',$service->id] , 'id' => 'form-delete-serv']) !!}
						{!! Form::submit('حذف', ['class'=>'btn btn-danger conf', 'data-val-title' => 'حذف الخدمة' , 'data-val-text' => 'هل متأكد من خذف خدمة : '. $service->title_ar] ) !!}
					{!! Form::close() !!} 
				</td>
			</tr>
			@endforeach
		</tbody>
		</table>
	</div>
	{!! $services->render() !!}
@else
	<div class="nice-msg">لا توجد خدمات للعرض .</div>
@endif



@endsection

<script type="text/javascript">
	$('.conf').click(function(event) {
		
		event.preventDefault() ;
	});
	
</script>
@stop

