<div class="col-lg-12">
     @if(@$type == 'edit')
          <img class="" style="height:200px;width: 500px;margin-bottom: 20px" src="{{Url('/')}}/uploads/back/slider/{{$image->image}}">
     @endif

     <div class = "form-group{{ $errors->has('img') ? ' has-error' : '' }}">
          {!!Form::label('img', 'إرفاق صورة')!!}
          {!!Form::file('img')!!}
          <p class = "help-block">يرجي اختيار صور مناسبة</p>
          <small class = "text-danger">{{ $errors->first('img') }}</small>
     </div>   
     <hr> 

     <button class='btn btn-info' type="submit">
          <i class="fa fa-check-circle"></i>   
          {{ $btnName }}
     </button>

</div>