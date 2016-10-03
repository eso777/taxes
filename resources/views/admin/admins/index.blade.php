@extends('admin.layout')
@section('title','المديرين')

@section('content')
<a href="{!!Url('/')!!}/admin/admins/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('alert'))
	{!! Session::get('alert') !!}
@endif

@if($admins->total() > 0 )
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel panel-heading text-center">المديرين</div>
		<div class="panel panel-body">
			<table class="table table-responsive ">
				<thead>
					<th>#</th>
					<th>الاسم</th>
					<th>البريد الالكترونى</th>
					<th colspan="2">خيارات</th>
				</thead>
				<tbody>
					@foreach($admins as $admin)
					<tr>
						<td>{{ $admin->id }}</td>
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						<td>
							<a href="{{ Url('/') }}/admin/admins/{{ $admin->id }}/edit" class="btn btn-warning">تعديل</a>
						</td>
						<td>
							{!! Form::open(['method'=>'DELETE' , 'action' => ['AdminsCtrl@destroy' , $admin->id] ]) !!}
							@if(Auth::admin()->get()->id == $admin->id)
							{!! Form::submit('حذف', ['class'=>'btn btn-danger disabled'] ) !!}
							@else
							{!! Form::submit('حذف', ['class'=>'btn btn-danger conf',
								'data-val-text'=>'سيتم حذف كل بيانات هذا العضو هل انت متأكد من الحذف ؟',
								'data-val-title'=> 'حذف المدير :' .$admin->name]) !!}
							@endif
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="paginate">{!! $admins->render() !!}</div>
		</div>
	</div>
</div>
@else
<div class="nice-msg">لا توجد بيانات للعرض.</div>
@endif
@endsection
@stop