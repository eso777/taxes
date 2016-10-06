@extends('admin.layout')
@section('title','الإعلانات')

@section('content')

<a href="{!!Url('/')!!}/admin/ads/create" class="btn btn-success" title= "إضافة إعلان جديدة">
     <i class="fa fa-plus"></i> إضافة</a>
<br>
<br>

@if(Session::has('alert'))
{!! Session::get('alert') !!}
@endif
@if($ads->count() > 0)

<div class="panel panel-primary">
     <div class="text-center panel-heading">الإعــلانــات</div>
     <table class="table table-responsive table-striped table-bordered">
          <thead>
          <th>#</th>
          <th>الــــصورة</th>
          <th colspan="4">خيارات</th>
          </thead>
          <tbody>
               @foreach($ads as $one)
               <tr>
                    <th>{{$one->id}}</th>
                    <td>
                         <img class="" style="height:60px;width: 150px" src="{{Url('/')}}/uploads/back/ads/{{$one->image}}">
                    </td>
                    <td>
                         {!! Form::open(['method'=>'DELETE','action' =>['AdsCtrl@destroy',$image->id] , 'id' => 'form-delete-serv']) !!}
                         <a href="{{ Url('/') }}/admin/ads/{{ $one->id }}/edit" class="btn btn-warning"> تعديل </a>
                         {!! Form::submit('حذف', ['class'=>'btn btn-danger conf', 'data-val-title' => 'حذف الصورة' , 'data-val-text' => 'هل متأكد من حذف الصورة؟ : '] ) !!}
                         {!! Form::close() !!} 
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
{!! $ads->render() !!}
@else
<div class="nice-msg">لا توجد إعـلانـات للعرض</div>
@endif
@endsection
@stop 
