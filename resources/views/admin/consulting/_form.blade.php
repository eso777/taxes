<div class="form-group{{ $errors->has('title_ar') ? ' has-error' : '' }}">
    {!! Form::label('title_ar', 'عنوان الإستشارة باللغة العربية') !!}
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('title_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
    {!! Form::label('title_en', 'اعنوان الإستشارة باللغة الأنجليزية') !!}
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
<!-- S E O -->
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


