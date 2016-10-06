@extends('admin.layout')
@section('title','الإعلانات ')
@section('content')

<div class="col-md-12">
     <div class="panel panel-primary">
          <div class="text-center panel-heading">إضافة إعلان جديد</div>
          <div class="panel-body">
               {!! Form::open(['files'=>true]) !!}
               @include('admin.ads._form',['btnName'=>'إضافة'])
               {!! Form::close() !!}
          </div>	
     </div>
</div>

@endsection
@stop