@extends('front.dashboard.layout')
	@section('title',Lang::get('dashboard.openion'))
	@section('dashboard')
		@if(Session::has('msg'))
			<div class="alert alert-success">
				{{Session::get('msg')}}
			</div>
		@endif
		{!!Form::open()!!}
			<div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
		        <label for="">{{Lang::get('dashboard.openion')}}</label>
		        {!! Form::textarea('text',null,['class'=>'form-control']) !!}
		        <small class="text-danger">{{ $errors->first('text') }}</small>
		    </div>
			<button type="submit" class="btn btn-info">{{Lang::get('dashboard.save')}}</button>
		{!!Form::close()!!}
	@endsection
@stop