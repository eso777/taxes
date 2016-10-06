<?php

use Carbon\Carbon; ?>
@extends('front.layout')
@section('title' , Lang::get('index.about'))

@section('content')

<section class="page-content">
     <div class="page-ttl">
          <div class="container">
               <div class="row">
                    <div class="col-sm-8">
                         <h1 style="font-size: 20px; margin-top: 5px;">{{$blog_one['news_title_'.Session::get('local')]}}<h1>
                    </div>
                    <div class="col-sm-4">
                         <ol class="breadcrumb">
                              <li><a href="{{Url('/')}}">{{Lang::get('index.title')}}</a></li>
                              <li class="active">{{Lang::get('index.aboutComp')}}</li>
                         </ol>
                    </div>
               </div>
          </div>
     </div>
     
     <div class="container">
          <div class="row">
               <div class="col-sm-8">
                    <div class="post-wrap widget">
                         <div class="post-img text-center">
                              <img src="{{Url('/')}}/uploads/back/news/{{$blog_one->img}}">
                         </div>
                         <div class="post-info text-center">
                              <span><i class="glyphicon glyphicon-tags"></i><a href="{{Url('/')}}/blog">  {{Lang::get('index.news')}}</a></span>
                              <span><i class="glyphicon glyphicon-calendar"></i>  {{Carbon::parse($blog_one->created_at)->diffForHumans()}}</span>
                         </div>
                         <div class="post-content">
                              {!! $blog_one['news_content_'.Session::get('local')] !!}
                         </div>
                    </div>
                    <div class="widget">
                         <h2>{{ Lang::get('index.comments') }}</h2>
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

               <div class="col-sm-4">
                    <div class="widget">
                         <h2>{{Lang::get('index.adsArea')}}</h2>
                    </div>

                    <div class="widget">
                         <h2>{{Lang::get('index.relatedNews')}}</h2>
                         <div class="widget-posts">
                         @if(count($related_art) > 0)
                         @foreach($related_art as $one)
                              <div class="blog-post">
                                   <a href="{{Url('/')}}/blog/{{$one['id']}}-{{$one['slug']}}" class="blog-post-thumb">
                                        <img src="{{Url('/')}}/uploads/back/news/{{$one['image']}}">
                                   </a>
                                   <div class="blog-post-content">
                                        <h3><a href="{{Url('/')}}/blog/{{$one['id']}}-{{$one['slug']}}"> {{ str_limit($one['name'] , 50) }} </a></h3>
                                   </div>
                              </div>
                         @endforeach
                         @else
                         <div class="blog-post">
                              <h4>{{Lang::get('index.noRelated')}}</h4>
                         </div> 
                         @endif
                         </div>
                    </div>
               </div>
                                          
          </div>
     </div>
</section>

@endsection
@stop