<div class="form-group{{ $errors->has('news_title_ar') ? ' has-error' : '' }}">
    {!! Form::label('news_title_ar', 'العنوان باللغة العربية') !!}
    {!! Form::text('news_title_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('news_title_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('news_title_en') ? ' has-error' : '' }}">
    {!! Form::label('news_title_en', 'العنوان باللغة الأنجليزية') !!}
    {!! Form::text('news_title_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('news_title_en') }}</small>
</div>

<div class="form-group{{ $errors->has('news_content_ar') ? ' has-error' : '' }}">
    {!! Form::label('news_content_ar', 'المحتوي باللغة العربية') !!}
    {!! Form::textarea('news_content_ar', null, ['class' => 'ckeditor form-control']) !!}
    <small class="text-danger">{{ $errors->first('news_content_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('news_content_en') ? ' has-error' : '' }}">
    {!! Form::label('news_content_en', 'المحتوي باللغة الأنجليزية') !!}
    {!! Form::textarea('news_content_en', null, ['class' => 'ckeditor form-control']) !!}
    <small class="text-danger">{{ $errors->first('news_content_en') }}</small>
</div>

@if(@$type == 'edit')
    @if($news->img !== '')
        <a href="{!!Url('/')!!}/admin/news-img-delete/{{$news->id}}/{{$news->img}}"><i class='fa fa-close' title='حذف الصورة' style='position:absolute; cursor:pointer'></i>
        </a>
        <img src="{!! Url('/')!!}/uploads/back/news/{{ $news->img }}" class="img-responsive img-thumbnail custom-img" >
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
    {!! Form::label('meta_desc_ar', 'النص المختصر باللغةالعربية') !!}
    {!! Form::textarea('meta_desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
    {!! Form::label('meta_desc_en', 'النص المختصر باللغة الإنجليزية') !!}
    {!! Form::textarea('meta_desc_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_en') }}</small>
</div>  

<div class="form-group{{ $errors->has('tags_ar') ? ' has-error' : '' }}">
    {!! Form::label('tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
    {!! Form::text('tags_ar', null, ['class' => 'form-control', 'required' => 'required','id'=>'tags_1']) !!}
    <small class="text-danger">{{ $errors->first('tags_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
    {!! Form::label('tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
    {!! Form::text('tags_en', null, ['class' => 'form-control', 'required' => 'required','id'=>'tags_2']) !!}
    <small class="text-danger">{{ $errors->first('tags_en') }}</small>
</div>


<button type="submit" class="btn btn-primary">
	{{  $btnName }}	
</button>


