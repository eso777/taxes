@extends('admin.layout')
@section('content')
<div class="col-md-12">
		
	@if(Session::has('alert'))
		{!! Session::get('alert') !!}
	@endif

    @if (Session::get('errors'))
        <div class="alert alert-dismissable alert-warning">
            <h4>Uwaga!</h4>
            <ul>
                @foreach (Session::get('errors')->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

	<div class="table panel-primary">
		<div class="text-center panel-heading">التحكم في أعدادات الموقع </div>
		<div class="col-md-11 panel-body">
			
			{!! Form::model($settings,['method'=>'PATCH' , 'action' => ['SettingsCtrl@update' , $settings->id ] ]) !!}
			
			<div class="form-group{{ $errors->has('site_name_ar') ? ' has-error' : '' }}">
				{!! Form::label('site_name_ar', 'اسم الموقع باللغة العربية') !!}
				{!! Form::text('site_name_ar', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('site_name_ar') }}</small>
			</div>
			
			<div class="form-group{{ $errors->has('site_name_en') ? ' has-error' : '' }}">
				{!! Form::label('site_name_en', 'اسم الموقع باللغة الأنجليزية') !!}
				{!! Form::text('site_name_en', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('site_name_en') }}</small>
			</div>
			<div class="form-group{{ $errors->has('site_desc_ar') ? ' has-error' : '' }}">
				{!! Form::label('site_desc_ar', 'وصف الموقع باللغة العربية') !!}
				{!! Form::textarea('site_desc_ar', null, ['class' => 'form-control']) !!}
		  		<small class="text-danger">{{ $errors->first('site_desc_ar') }}</small>
			</div>
			
			<div class="form-group{{ $errors->has('site_desc_en') ? ' has-error' : 'site_desc_en' }}">
				{!! Form::label('site_desc_en', 'وصف الموقع باللغة الأنجليزية') !!}
				{!! Form::textarea('site_desc_en', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('site_desc_en') }}</small>
			</div>
			
			<div class="form-group{{ $errors->has('site_tags_ar') ? ' has-error' : '' }}">
				{!! Form::label('site_tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
				{!! Form::textarea('site_tags_ar', null, ['class' => 'form-control','id'=>'tags_1']) !!}
				<small class="text-danger">{{ $errors->first('site_tags_ar') }}</small>
			</div>
			<div class="form-group{{ $errors->has('site_tags_en') ? ' has-error' : '' }}">
				{!! Form::label('site_tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
				{!! Form::textarea('site_tags_en', null, ['class' => 'form-control','id'=>'tags_2']) !!}
				<small class="text-danger">{{ $errors->first('site_tags_en') }}</small>
			</div>

			<div class="form-group{{ $errors->has('facebook') ? ' has-error' : 'facebook' }}">
				{!! Form::label('facebook', 'فيس بوك') !!}
				{!! Form::text('facebook', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('') }}</small>
			</div>
			
			<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
				{!! Form::label('twitter', 'تويتر') !!}
				{!! Form::text('twitter', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('twitter') }}</small>
			</div>
			<div class="form-group{{ $errors->has('google_Plus') ? ' has-error' : '' }}">
				{!! Form::label('google_Plus', 'جوجل بلس') !!}
				{!! Form::text('google_Plus', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('google_Plus') }}</small>
			</div>
			<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
				{!! Form::label('youtube', 'يوتيوب') !!}
				{!! Form::text('youtube', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('youtube') }}</small>
			</div>
			
			<div class="form-group{{ $errors->has('linkedIn') ? ' has-error' : '' }}">
				{!! Form::label('linkedIn', 'لينكد أن') !!}
				{!! Form::text('linkedIn', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('linkedIn') }}</small>
			</div>

			<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
				{!! Form::label('address', 'العنوان') !!}
				{!! Form::textarea('address', null, ['class' => 'form-control']) !!}
				<small class="text-danger">{{ $errors->first('address') }}</small>
			</div>

			<!-- Email -->
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			    {!! Form::label('email', 'البريد الإلكتروني') !!}
			    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
			    <small class="text-danger">{{ $errors->first('email') }}</small>
			</div>
			<!-- Email -->

			<!-- Email 2 -->
			<div class="form-group{{ $errors->has('email_2') ? ' has-error' : '' }}">
				{!! Form::label('email_2', 'البريد الإلكتروني 2') !!}
				{!! Form::email('email_2', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
				<small class="text-danger">{{ $errors->first('email_2') }}</small>
			</div>
			<!-- Email 2-->

			<!-- phone -->
			<div class="content-phone">
				<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
			    {!! Form::label('phone', 'رقم التليفون') !!}
			    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('phone') }}</small>
				</div>
			</div>
			<!-- phone -->

			<!-- phone 2 -->
			<div class="content-phone">
				<div class="form-group{{ $errors->has('phone_2') ? ' has-error' : '' }}">
					{!! Form::label('phone_2', 'رقم التليفون 2') !!}
					{!! Form::text('phone_2', null, ['class' => 'form-control']) !!}
					<small class="text-danger">{{ $errors->first('phone_2') }}</small>
				</div>
			</div>
			<!-- phone 2 -->

			{!! Form::submit('حفظ التعديلات', array('required', 'class'=>'btn btn-primary')) !!}
			
			{!! Form::close() !!}
			
		</div>
	</div>
</div>
@stop