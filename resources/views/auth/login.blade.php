@extends('front.layout')
@section('content')
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-wrap" style="margin-top: 50px;">
                        <h1 class="form-ttl"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Lang::get('menu.login')}}</h1>
                       {!! Form::open() !!}
                        @if(Session::has('error'))
                            <div class="alert alert-danger"> {!! Session::get('error') !!} </div>
                        @endif

                        {{-- If Session Has Session  --}}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    {!!Lang::get('assets.whoops')!!}
                                    <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', Lang::get('menu.email')) !!}
                                {!! Form::email('email', null, ['class' => 'form-control','id'=>"email" ,'autocomplete'=>"off"]) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password"> {{Lang::get('menu.password')}} <span class="require">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                                <small class="text-danger">{{ $errors->first('password') }}</small><br />
                            </div>
                        <div class="col-md-6"><span class="text-left"><a href="#">نسيت كلمة المرور؟</a></span></div>
                        <div class="col-md-6"><span class="text-right"><a href="{{Url('/')}}/register">{{Lang::get('loginReg.registerNewAccount')}}</a> </span> </div>

                        <button type="submit">{{Lang::get('menu.login-btn')}}</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@stop