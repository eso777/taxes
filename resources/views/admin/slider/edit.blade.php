@extends('admin.layout')
@section('title','عارض الصور')
@section('content')

<div class="col-md-12">
     <div class="panel panel-primary">
          <div class="text-center panel-heading">تعديل </div>
          <div class="panel-body">
               {!! Form::model($image, ['action' => ['SliderCtrl@update', $image->id], 'method' => 'PUT', 'class' => 'form-horizontal','files'=>true])!!}
                    @include('admin.slider._form',['btnName'=>'حفظ التعديلات','type'=>'edit'])
               {!! Form::close() !!}
          </div>	
     </div>
</div>

@endsection
@stop