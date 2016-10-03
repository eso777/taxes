<div class="form-group{{ $errors->has('title_ar') ? ' has-error' : '' }}">
    {!! Form::label('title_ar', 'العنوان باللغة العربية') !!}
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('title_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
    {!! Form::label('title_en', 'العنوان باللغة الأنجليزية') !!}
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('title_en') }}</small>
</div>

<div class="form-group{{ $errors->has('content_ar') ? ' has-error' : '' }}">
    {!! Form::label('content_ar', 'المحتوي باللغة العربية') !!}
    {!! Form::textarea('content_ar', null, ['class' => 'ckeditor form-control']) !!}
    <small class="text-danger">{{ $errors->first('content_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('content_en') ? ' has-error' : '' }}">
    {!! Form::label('content_en', 'المحتوي باللغة الأنجليزية') !!}
    {!! Form::textarea('content_en', null, ['class' => 'ckeditor form-control']) !!}
    <small class="text-danger">{{ $errors->first('content_en') }}</small>
</div>

@if(@$type == 'edit')
    @if($service->img !== '')
        <a href="{!!Url('/')!!}/admin/serv-img-delete/{{$service->id}}/{{$service->img}}"><i class='fa fa-close' title='حذف الصورة' style='position:absolute; cursor:pointer'></i>
        </a>
        <img src="{!! Url('/')!!}/uploads/back/services/{{ $service->img }}" class="img-responsive img-thumbnail custom-img" >
    @else 
        <div class="nice-msg ">لا توجد صورة للعرض .</div>
    @endif
@endif


<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'أرفاق صورة') !!}
    {!! Form::file('image') !!}
    <p class="help-block">يرجي تحديد صورة مناسبة للخدمة</p>
    <small class="text-danger">{{ $errors->first('image') }}</small>
</div>

<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
    {!! Form::label('meta_desc_ar', 'النص المختصر باللغة العربية') !!}
    {!! Form::textarea('meta_desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('meta_desc_en') ? ' has-error' : '' }}">
    {!! Form::label('meta_desc_en', 'النص المختصر باللغة الأنجليزية') !!}
    {!! Form::textarea('meta_desc_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_en') }}</small>
</div>  

<div class="form-group{{ $errors->has('tags_ar') ? ' has-error' : '' }}">
    {!! Form::label('tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
    {!! Form::text('tags_ar', null, ['class' => 'form-control', 'required' => 'required','id'=> 'tags_1' ]) !!}
    <small class="text-danger">{{ $errors->first('tags_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
    {!! Form::label('tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
    {!! Form::text('tags_en', null, ['class' => 'form-control', 'required' => 'required','id'=> 'tags_2']) !!}
    <small class="text-danger">{{ $errors->first('tags_en') }}</small>
</div>

<button type="submit" class="btn btn-primary">
	{{ $btnName }}	
</button>
