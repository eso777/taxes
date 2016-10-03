@extends('front.layout')
@section('title' , Lang::get('index.about'))

@section('content')

<section class="page-content">
    <div class="page-ttl">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>{{Lang::get('index.about')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li><a href="{{ Url('/') }}"> {{Lang::get('index.title')}} </a></li>
                        <li class="active">{{Lang::get('index.about')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-wrap">
            {!!  $info['Content_'.Session::get('local')]   !!}
        </div>
    </div>
</section>


@endsection
@stop