@extends('admin.layout')
@section('title' , 'الإستشارات')
@section('content')
<a href="{!!Url('/')!!}/admin/consulting/create" class="btn btn-success" title="إضافة إستشارة جديدة">
     <i class="fa fa-plus"></i></a>
<br>
<br>

@if(Session::has('alert'))
{!! Session::get('alert') !!}
@endif

@if($consulting->total() > 0 )
<div class="panel panel-primary">
     <div class="text-center panel-heading">الإستشارات</div>
     <table class="table table-responsive table-striped">
          <thead>
          <th>#</th>
          <th>عنوان الإستشارة العربي</th>
          <th>عنوان الإستشارة الأنجليزي</th>
          <th colspan="4">خيارات</th>
          </thead>
          <tbody>
               @foreach($consulting as $one)
               <tr>
                    <td>{{ $one->id }}</td>
                    <td>{{ $one->title_ar }}</td>
                    <td>{{ $one->title_en }}</td>

                    <td>
                         <a href="{{ Url('/') }}/admin/consulting/{{ $one->id }}/edit" class="btn btn-warning"> تعديل </a>
                    </td>

                    <td>
                         {!! Form::open(['method'=>'DELETE','action' =>['ConsultingCtrl@destroy',$one->id] , 'id' => 'form-delete-serv']) !!}
                         {!! Form::submit('حذف', ['class'=>'btn btn-danger conf', 'data-val-title' => 'حذف الإستشارة' , 'data-val-text' => 'هل متأكد من خذف الإستشارة؟ : '. $one->title_ar] ) !!}
                         {!! Form::close() !!} 
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
{!! $consulting->render() !!}
@else
<div class="nice-msg">لا توجدإستشارات  للعرض .</div>
@endif



@endsection

<script type="text/javascript">
     /*$('.conf').click(function(event) {
      
      event.preventDefault() ;
      });*/

</script>
@stop

