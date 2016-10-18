@extends('front.layout')
@section('content')
    <section class="page-content">

        @if(Session::has('alert'))
            {!! Session::get('alert') !!}
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-wrap" style="margin-top: 50px;">
                        <h1 class="form-ttl"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> {{Lang::get('loginReg.titleReg')}}</h1>
                        {!! Form::open(['files'=>true]) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', Lang::get('loginReg.username')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('name_company') ? ' has-error' : '' }}">
                            {!! Form::label('name_company', Lang::get('loginReg.name_company')) !!}
                            {!! Form::text('name_company', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('name_company') }}</small>
                        </div>

                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                            <label for="">{{Lang::get('loginReg.image')}}</label>
                            {!!Form::file('img')!!}
                            <small class="text-danger">{{ $errors->first('img') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', Lang::get('loginReg.email')) !!}
                            {!! Form::email('email', null, ['class' => 'form-control' , 'autocomplate'=>'off']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            {!! Form::label('mobile', Lang::get('loginReg.mobile')) !!}
                            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('ground-tel') ? ' has-error' : '' }}">
                            {!! Form::label('ground-tel', Lang::get('loginReg.ground-tel')) !!}
                            {!! Form::text('ground-tel', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('ground-tel') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('field') ? ' has-error' : '' }}">
                            {!! Form::label('field', Lang::get('loginReg.field')) !!}
                            {!! Form::textarea('field', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('field') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', Lang::get('loginReg.password')) !!}
                            {!! Form::password('password',  ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation', Lang::get('loginReg.passwordConf')) !!}
                            {!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                        </div>

                        <button type="submit">{{Lang::get('loginReg.register')}}</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@stop