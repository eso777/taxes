@extends('admin.layout')
@section('title','عارض الصور')
@section('content')

<div class="col-md-12">
     <div class="panel panel-primary">
          <div class="text-center panel-heading">إضافة صور جديدة</div>
          <div class="panel-body">
               {!! Form::open(['files'=>true]) !!}
               @include('admin.slider._form',['btnName'=>'إضافة'])
               {!! Form::close() !!}
          </div>	
     </div>
</div>

@endsection
@stop