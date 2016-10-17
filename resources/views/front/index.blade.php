@extends('front.layout')
@section('title',Lang::get('index.title'))
@section('content')
<!-- masterslider -->
<div class="master-slider ms-skin-default" id="of-home" style="direction: ltr;">
     <!--      new slide 
          <div class="ms-slide">
                slide background 
               <img src="{{Url('/')}}/front/js/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/slide-1.jpg" alt="lorem ipsum dolor sit"/>
                slide text layer 
               <div class="ms-layer ms-caption" style="top:10px; left:30px;">
     
               </div>
          </div>
           end of slide -->

     <!--      new slide 
          <div class="ms-slide">
                slide background 
               <img src="{{Url('/')}}/front/js/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/slide-2.jpg" alt="lorem ipsum dolor sit"/>
                slide text layer 
               <div class="ms-layer ms-caption" style="top:10px; left:30px;">
     
               </div>
                linked slide 
               <a href="#"></a>-->
     <!-- new slide -->
     @if($slider->count() > 0)  
     @foreach($slider as $slide)
     <div class="ms-slide">
          <!-- slide background -->
          <img src="{{Url('/')}}/uploads/back/slider/{{$slide->image}}" data-src="{{Url('/')}}/uploads/back/slider/{{$slide->image}}" alt="lorem ipsum dolor sit"/>
          <!-- slide text layer -->
          <div class="ms-layer ms-caption" style="top:10px; left:30px;">

          </div>
     </div>
     @endforeach
     @endif


</div>
<!-- end of slide -->



<!-- end of masterslider -->


<section id="about" class="section">
     <div class="container">
          <h1 class="sec-ttl wow fadeInUp">{{Lang::get('index.about_company')}}</h1>

          <div class="row">
               <div class="col-sm-5 wow fadeInRight">
                    <div class="about-carousel">
                         <a class="prev"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i></a>
                         <a class="next"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
                         <div id="owl-demo" class="owl-carousel owl-theme" style="direction: ltr;">
                              @if($info->imgs)
                              <?php $images = explode("|", $info->imgs); ?>
                              @foreach($images as $img )
                              <div class="item">
                                   <a class="#"><img src="{{Url('/')}}/uploads/back/aboutCompany/{{$img}}"></a>
                              </div>
                              @endforeach
                              @endif
                         </div>
                    </div>
               </div>
               <div class="col-sm-7 about-text wow fadeInLeft">
                    </p>
                    {{ strip_tags(str_limit($info['Content_'.Session::get('local')], 1500)) }}
                    </p>
               </div>
          </div>
     </div>
</section>

@if($services->count() > 0)
<section id="services" class="section">
     <div class="container">
          <h1 class="sec-ttl wow fadeInUp">{{Lang::get('index.our_serv')}}</h1>

          <div class="row">
               @foreach($services as $service)
               <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service">
                         <figure class="service-thumb">
                              <a href="{{ Url('/') }}/servies/{{ $service->id }}-{{$service['slug_'.Session::get('local')]}}">
                                   <img src="{{Url('/')}}/uploads/back/services/{{$service->img}}">
                                   <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                              </a>
                         </figure>
                         <div class="service-content">
                              <h3><a href="{{ Url('/') }}/servies/{{ $service->id }}-{{$service['slug_'.Session::get('local')]}}">{{$service['title_'.Session::get('local')]}}</a></h3>
                              {{ str_limit($service['meta_desc_'.Session::get('local')], 150) }}
                         </div>
                    </div>
               </div>
               @endforeach
          </div>
     </div>
</section>
@endif

<section id="consulting">
     <div class="container">
          <div class="row">
               <div class="col-sm-9">
                    <h2>{{Lang::get('index.looking')}}</h2>
                    <p>{{Lang::get('index.text')}}</p>
               </div>
               <div class="col-sm-3 text-left">
                    <a href="{{Url('/')}}/send/consulting" class="ask-btn">{{ Lang::get('index.AskCounselNow') }}</a>
               </div>
          </div>
     </div>
</section>

@if($testimonials->count() > 0)
<section id="quotes" class="section">
     <div class="container">
          <h1 class="sec-ttl wow fadeInUp">{{Lang::get('index.guest')}}</h1>
          <div class="row">


               @foreach($testimonials as $one)
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                         <div class="quote">
                              <div class="client-img">
                                   <img src="{{Url('/')}}/uploads/users/{{$users->find($one->user_id)['image']}}">
                              </div>
                              <p>
                                   {{ $one->text  }}
                              </p>
                              <div class="client-info">
                                   <h3>{{$users->find($one->user_id)['name']}}</h3>
                                   <span>{{$users->find($one->user_id)['name_company']}}</span>
                              </div>
                         </div>
                    </div>
               @endforeach
          </div>
     </div>
</section>
@endif
@endsection
@stop