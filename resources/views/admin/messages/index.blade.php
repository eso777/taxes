@extends('admin.layout')
@section('title' , 'الرسائل')
@section('content')
<a href="{!!Url('/')!!}/admin/messages/create" class="btn btn-success" title="أرسال رسالة جديدة">
     <i class="fa fa-plus"></i>رسالة جديدة</a>
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


@if($messages->total() > 0 )

<ul class="list-group">
     @foreach ($messages as $msg)
     <li class="list-group-item">
          <a href="{!! Url('/') !!}/admin/messages/getMsgs/{!!$msg->user_id!!}">
               {!! @$users->find(@$msg->user_id)->name !!}
          </a>
          <?php $unread = $msgs->where('user_id', $msg->user_id)->where('status', 0)->where('sender', 1)->count()
          ?>
          @if($unread > 0 )
          <span class="badge badge-warning">{{$unread}} </span>
          @endif
     </li>
     @endforeach
</ul>
@else
<div class="nice-msg">لا توجد محادثات للعرض .</div>
@endif



@endsection

<script type="text/javascript">
     /*$('.conf').click(function(event) {
      
      event.preventDefault() ;
      });*/

</script>
@stop

