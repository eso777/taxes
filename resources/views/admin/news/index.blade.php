@extends('admin.layout')
@section('title' , 'الأخبار')
@section('content')
<a href="{!!Url('/')!!}/admin/news/create" class="btn btn-success" title="أضافة خدمة جديدة">
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

@if($news->total() > 0 )
<div class="panel panel-primary">
     <div class="text-center panel-heading">الأخباار</div>
     <table class="table table-responsive table-striped">
          <thead>
          <th>#</th>
          <th>عنوان الخبر العربي</th>
          <th>عنوان الخبر الأنجليزي</th>
          <th colspan="4">خيارات</th>
          </thead>
          <tbody>
               @foreach($news as $one)
               <tr>
                    <td>{{ $one->id }}</td>
                    <td>{{ $one->news_title_ar }}</td>
                    <td>{{ $one->news_title_en }}</td>

                    <td>
                         <a href="{{ Url('/') }}/admin/news/{{ $one->id }}/edit" class="btn btn-warning"> تعديل </a>
                    </td>

                    <td>
                         {!! Form::open(['method'=>'DELETE','action' =>['NewsCtrl@destroy',$one->id] , 'id' => 'form-delete-serv']) !!}
                         {!! Form::submit('حذف', ['class'=>'btn btn-danger conf', 'data-val-title' => 'حذف الخبر' , 'data-val-text' => 'هل متأكد من خذف الخبر : '. $one->news_title_ar] ) !!}
                         {!! Form::close() !!} 
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
{!! $news->render() !!}
@else
<div class="nice-msg">لا توجد اخبار للعرض .</div>
@endif



@endsection

<script type="text/javascript">
     /*$('.conf').click(function(event) {
      
      event.preventDefault() ;
      });*/

</script>
@stop

