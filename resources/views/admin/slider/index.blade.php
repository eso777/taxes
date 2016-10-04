@extends('admin.layout')
@section('title',' عارض الصور ')

@section('content')

<a href="{!!Url('/')!!}/admin/slider/create" class="btn btn-success" title= "إضافة صور جديدة">
     <i class="fa fa-plus"></i> إضافة</a>
<br>
<br>

@if(Session::has('alert'))
{!! Session::get('alert') !!}
@endif
@if($slider->count() > 0)

<div class="panel panel-primary">
     <div class="text-center panel-heading">الصـــور</div>
     <table class="table table-responsive table-striped table-bordered">
          <thead>
          <th>#</th>
          <th>الــــصورة</th>
          <th colspan="4">خيارات</th>
          </thead>
          <tbody>
               @foreach($slider as $image)
               <tr>
                    <th>{{$image->id}}</th>
                    <td>
                         <img class="" style="height:60px;width: 150px" src="{{Url('/')}}/uploads/back/slider/{{$image->image}}">
                    </td>
                    <td>
                         {!! Form::open(['method'=>'DELETE','action' =>['SliderCtrl@destroy',$image->id] , 'id' => 'form-delete-serv']) !!}
                         <a href="{{ Url('/') }}/admin/slider/{{ $image->id }}/edit" class="btn btn-warning"> تعديل </a>
                         {!! Form::submit('حذف', ['class'=>'btn btn-danger conf', 'data-val-title' => 'حذف الصورة' , 'data-val-text' => 'هل متأكد من حذف الصورة؟ : '] ) !!}
                         {!! Form::close() !!} 
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
{!! $slider->render() !!}
@endif
@endsection
@stop 
