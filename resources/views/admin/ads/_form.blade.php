<div class="col-lg-12 ads-styles">
     @if(@$type == 'edit')
     <img class="" style="height:200px;width: 500px;margin-bottom: 20px" src="{{Url('/')}}/uploads/back/ads/{{$ads->image}}">
     @endif

     <div class="col-lg-12 selectDiv">
          <lable> نــوع الإعــلان</lable>
          <select id="selection" class="form-control" name="selection">
               <option value="0"  > مـن فضلك اختر نوع الإعلان</option>
               <option value="1">  صــورة </option>
               <option value="2"> كود </option>
          </select> 
     </div>

     <div class="col-lg-12" id= "ads_file">
          <div class = "form-group{{ $errors->has('img') ? ' has-error' : '' }}" >
               {!!Form::label('img', 'إرفاق صورة')!!}
               {!!Form::file('img')!!}
               <p class = "help-block">يرجي اختيار صور مناسبة</p>
          </div>   
          <hr> 
          <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}" >
               {!! Form::label('link', 'رابــط الإعــلان') !!}
               {!! Form::text('link', null, ['class' => 'form-control']) !!}
               <small class="text-danger">{{ $errors->first('link') }}</small>
          </div>
     </div>

     <div class="form-group{{ $errors->has('code_ads') ? ' has-error' : '' }}" id= "ads_code">
          {!! Form::label('code_ads', 'كــود الإعـلان') !!}
          {!! Form::textarea('code_ads', null, ['class' => 'form-control']) !!}
          <small class="text-danger">{{ $errors->first('code_ads') }}</small>
     </div>

     <div class="col-lg-12 btn-custom">
          <button class='btn btn-info' type="submit"disabled="disabled">
               <i class="fa fa-check-circle"></i>   
               {{ $btnName }}
          </button>
     </div>
     <script>
          $('#selection').change(function () {
               console.log($(this).val());
               if ($(this).val() == 1)
               {
                    $('#ads_file').fadeIn(1000);
                    $('#ads_code').fadeOut(1000);
                    $('.btn-custom button').attr('disabled',false) ;
               }
               if ($(this).val() == 2)
               {
                    $('#ads_file').fadeOut(1000);
                    $('#ads_code').fadeIn(1000);
                    $('.btn-custom button').attr('disabled',false) ;
               }
               if ($(this).val() == 0)
               {
                    $('#ads_file').fadeOut(500);
                    $('#ads_code').fadeOut(500);
                    $('.btn-custom button').attr('disabled',true) ;
               }
          });
     </script>

</div>

