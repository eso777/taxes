<?php

use Carbon\Carbon; ?>
@extends('front.layout')
@section('title' , Lang::get('index.title_one'))

@section('content')
<section class="page-content">
     <div class="page-ttl">
          <div class="container">
               <div class="row">

                    <div class="col-sm-6">
                         <h1><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> {{ Lang::get('consulting.title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb">
                              <li><a href="{{Url('/')}}"> {{ Lang::get('index.title') }}</a></li>
                              <li class="active"> {{ Lang::get('consulting.title') }}</li>
                         </ol>
                    </div>
               </div>
          </div>
     </div>
     <div class="container">
          <div class="row">
               <div class="col-md-8 col-md-offset-2">
                    <div class="post-wrap widget">
                         <div class="post-img text-center">
                              <!--<img src="{{Url('/')}}/front/images/logo.png">-->
                         </div>
                         <div class="post-info text-center" style="margin-top: 0;">
                              <span><i class="glyphicon glyphicon-tags"></i><a href="{{Url('/')}}/consulting">{{Lang::get('consulting.consultancyAndAdvice')}}</a></span>
                              <span> <i class="glyphicon glyphicon-calendar"></i> {{ Carbon::parse($consulting_one->created_at)->diffForHumans() }} </span>
                         </div>
                         <div class="post-content">
                              <p>{!! $consulting_one['content_'.Session::get('local')] !!}</p>
                         </div>
                    </div>
                    <div class="widget">
                         <h2>{{ Lang::get('consulting.comments') }}</h2>
                         <div id="disqus_thread"></div>
                         <script>
                              (function () { // DON'T EDIT BELOW THIS LINE
                                   var d = document, s = d.createElement('script');
                                   s.src = '//itag-1.disqus.com/embed.js';
                                   s.setAttribute('data-timestamp', +new Date());
                                   (d.head || d.body).appendChild(s);
                              })();
                         </script>
                         <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                    </div>
               </div>
          </div>
     </div>
</section>


@endsection
@stop