@extends('front.layout')
@section('title','send Consulting')

@section('content')

    @if(Session::has('msgSuccess'))
        {!! Session::get('msgSuccess') !!}
    @endif

    <section class="page-content">
        <div class="page-ttl">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> طلب استشارة</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li class="active">طلب استشارة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-wrap">
                        @if (Session::get('errors'))
                            <div class="alert alert-dismissable alert-warning">
                                <h4>Oopse!</h4>
                                <ul>
                                    @foreach (Session::get('errors')->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!--  <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> تم إرسال الطلب بنجاح!</div>-->
                        <!--  <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> من فضلك أكمل الحقول الناقصة!</div>-->
                        {!! Form::open() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder'=>Lang::get('index.name')]) !!}
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::text('email', null, ['class' => 'form-control' , 'placeholder'=>Lang::get('index.email')]) !!}
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!! Form::text('phone', null, ['class' => 'form-control' , 'placeholder'=>Lang::get('index.phone')]) !!}
                            </div>

                            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                {!! Form::text('about', null, ['class' => 'form-control' , 'placeholder'=>Lang::get('index.about')]) !!}
                            </div>

                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                {!! Form::textarea('subject', null, ['class' => 'form-control' , 'placeholder'=>Lang::get('index.subject')]) !!}
                            </div>

                            <button type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{Lang::get('index.btnSend')}}</button>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@stop