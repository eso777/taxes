@extends('admin.layout')
@section('title','عن الشركة ')
@section('content')

@if(Session::has('alert'))
{!! Session::get('alert') !!}
@endif

<div class="col-lg-12 row">
     <div class=" panel panel-primary ">
          <div class="panel-heading text-center">عن الشركة</div>

          <div class="panel-body col-md-11">
               {!! Form::model($info , ['action' => ['aboutCompCtrl@update', $info->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true,'multiple' => 'multiple']) !!}

               <div class="form-group{{ $errors->has('Content_ar') ? ' has-error' : '' }}">
                    <i class="fa fa-info"></i>
                    {!! Form::label('Content_ar', 'معلومات عن الشركة باللغة العربية') !!}
                    {!! Form::textarea('Content_ar', null, ['class' => 'ckeditor form-control']) !!}
                    <small class="text-danger">{{ $errors->first('Content_ar') }}</small>
               </div>
               <div class="form-group{{ $errors->has('Content_en') ? ' has-error' : '' }}">
                    <i class="fa fa-info"></i>
                    {!! Form::label('Content_en', 'معلومات عن الشركة باللغة الأنجليزية') !!}
                    {!! Form::textarea('Content_en', null, ['class' => 'ckeditor form-control']) !!}
                    <small class="text-danger">{{ $errors->first('Content_en') }}</small>
               </div>

               <table class="table">
                    @if($info->imgs !== '')
                    <?php $images = explode('|', $info->imgs); ?>
                    @foreach($images as $img)
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                         <div class="thumbnail">
                              <a href="{!! Url('/')!!}/uploads/back/aboutCompany/{{$img}}" target="_blank">
                                   <img src="{{Url('uploads/back/aboutCompany/'.$img)}}" style="height:100px;">
                              </a>
                              <a href="{{Url('admin/aboutComp/')}}/delete_img/{{$img}}"><i class='fa fa-close' style='color:red'></i>حذف الصورة </a>
                         </div>
                    </div>
                    @endforeach
                    @endif
                    <tr>
                         <td>
                              <label class="control-label"  style="text-align:right">إرفاق صور عن الشركة </label>
                         </td>
                         <td><div  class="col-md-10">
                                   <input name="image[]" type="file">
                                   <small class="text-danger"></small>
                              </div>
                         </td>
                    </tr>
                    <tbody class="input_fields_wrap">

                    </tbody>
                    <tr>
                         <td>
                              <a class="btn btn-primary" id="addmore">
                                   <i class="fa fa-plus"></i> إضافه المزيد من الصور</a>
                         </td>
                    </tr>
               </table>

               <button type="submit" class="btn btn-info pull-left">
                    <i class="fa fa-check"></i>
                    حفظ التعديلات
               </button>
               {!! Form::close() !!}
          </div>
     </div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () {
     var max_fields = 15; //maximum input boxes allowed
     var wrapper = $(".input_fields_wrap"); //Fields wrapper
     var add_button = $("#addmore"); //Add button ID

     var x = 1; //initlal text box count
     $(add_button).click(function (e) { //on add input button click
          e.preventDefault();
          if (x < max_fields) { //max input box allowed
               x++; //text box increment
               $(wrapper).append('<tr> <td> <label class="control-label" style="text-align:right">صور عن الشركة <label lable-danger>' + x + '</label>  (<a class="remove_field"><i class="fa fa-close"></i> تراجع </a>) </label></td> <td><div  class="col-md-11"> <input name="image[]" type="file"> <small class="text-danger"></small> </div></td> </tr>');//add input box
          }
     });

     $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text

          var remo = $(this).parent().parent().parent().hide('slow').remove();
          x--;
     })
});
</script>
@endsection
@stop