@extends('front.layout')
@section('title',Lang::get('consulting.title'))

@section('content')
@if($consulting->total() > 0)
<section class="page-content">
     <div class="page-ttl">
          <div class="container">
               <div class="row">
                    
                    <div class="col-sm-6">
                         <h1><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> {{ Lang::get('consulting.title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb">
                              <li><a href="{{Url('/')}}">{{ Lang::get('index.title') }}</a></li>
                              <li class="active">{{ Lang::get('consulting.title') }}</li>
                         </ol>
                    </div>
               </div>
          </div>
     </div>
     <div class="container">
          <div class="row">
               @foreach($consulting as $one)
               <div class="col-sm-6">
                    <div class="blog-post">
                         <div class="blog-post-content" style="padding: 0;">
                              <h3><a href="#"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> {{ $one['title_'.Session::get('local')]}}</a></h3>
                              <p> {!! str_limit($one['meta_desc_'.Session::get('local')] , 334) !!}</p>
                              <a href="{{Url('/')}}/consulting/{{$one->id}}-{{$one['slug_'.Session::get('local')]}}" class="more-btn">{{ Lang::get('consulting.details') }}</a>
                         </div>
                    </div>
               </div>
               @endforeach
          </div>
          <div class="text-center">
               {!! $consulting->render() !!}
          </div>
     </div>
</section>
@endif
@endsection 
@stop 