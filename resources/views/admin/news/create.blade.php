@extends('admin.layout') 
@section('title', 'اضافة خبر جديد')

@section('content')
     <div class="col-md-12">
            <div class="panel panel-primary">
                   <div class="text-center panel-heading">أضافة خبر جديدة</div>	
                   <div class="panel-body">
                       {!! Form::open([ 'action'=>'NewsCtrl@store' , 'files'=>true]) !!}	
                              @include('admin.news._form',['type'=>'create' , 'btnName'=>'حفظ'])
                       {!! Form::close() !!}
                   </div>	
            </div>
     </div>
@endsection
@stop