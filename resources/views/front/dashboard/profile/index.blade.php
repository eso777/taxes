 @extends('front.dashboard.layout')
 	@section('breadcrumbs')
 		<i class="{{Lang::get('dashboard.arrow')}}"></i>
 		{{Lang::get('dashboard.edit_personal')}}
 	@endsection

 	@section('title',Lang::get('dashboard.edit_personal'))
    @section('dashboard')
    <h1 class="dashboard-ttl">{{Lang::get('dashboard.edit_personal')}}</h1>
    {!!Form::model($user,['files'=>true])!!}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {!!Lang::get('assets.whoops')!!}
                <br>
            </div>
        @endif
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{Session::get('msg')}}
            </div>
        @endif
        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.username')}}</label>
            {!! Form::text('username',null,['class'=>'form-control','disabled'=>'disabled']) !!}
            <small class="text-danger">{{ $errors->first('username') }}</small>
        </div>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.email')}}</label>
             {!! Form::email('email',null,['class'=>'form-control','disabled'=>'disabled']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
       
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.name')}}</label>
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.image')}}</label>
            {!!Form::file('img')!!}
            <small class="text-danger">{{ $errors->first('img') }}</small>
        </div>
        <div class="form-group {{ $errors->has('pwd') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.password')}}</label>
            {!! Form::password('pwd',['class'=>'form-control']) !!}
            <small class="text-danger">{{ $errors->first('pwd') }}</small>
        </div>
        <div class="form-group {{ $errors->has('pwd_confirmation') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.passwordConf')}}</label>
            {!! Form::password('pwd_confirmation',['class'=>'form-control']) !!}
            <small class="text-danger">{{ $errors->first('pwd_confirmation') }}</small>
        </div>
        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.city')}}</label>
            {!!Form::select('city',$regions,null,['class'=>'form-control'])!!}
            <small class="text-danger">{{ $errors->first('city') }}</small>
        </div>
        
        <div class="form-group {{ $errors->has('details ') ? ' has-error' : '' }}">
            <label for="">{{Lang::get('loginReg.details')}}</label>
            {!! Form::textarea('details',null,['class'=>'form-control','style'=>"height: 200px;"]) !!}
            <small class="text-danger">{{ $errors->first('details ') }}</small>
        </div>
        <button type="submit" class="btn btn-info">{{Lang::get('dashboard.save')}}</button>
    {!!Form::close()!!}
    @endsection
@stop