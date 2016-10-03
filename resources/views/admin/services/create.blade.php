@extends('admin.layout') 
@section('title', 'اضافة خدمة جديدة')

@section('content')

<div class="col-md-12">
     <div class="panel panel-primary">
          <div class="text-center panel-heading">أضافة خدمة جديدة</div>	
          <div class="panel-body">

               {!! Form::open([ 'action'=>'ServicesCtrl@store' , 'files'=>true]) !!}	
               @include('admin.services._form',['type'=>'create' , 'btnName'=>'حفظ'])
               {!! Form::close() !!}
          </div>	
     </div>
</div>

@endsection
@stop