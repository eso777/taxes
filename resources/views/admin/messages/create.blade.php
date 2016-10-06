@extends('admin.layout') 
@section('title', 'رسالة جديدة')

@section('content')

<div class="col-md-12">
     <div class="panel panel-primary">
          <div class="text-center panel-heading">أرسال رسالة جديدة</div>	
          <div class="panel-body">

               {!! Form::open([ 'url'=>Url('admin/messages/getMsgs') , 'files'=>true]) !!}	
               @include('admin.messages._form',['btnName'=>'إرسال'])
               {!! Form::close() !!}
          </div>	
     </div>
</div>

@endsection
@stop
