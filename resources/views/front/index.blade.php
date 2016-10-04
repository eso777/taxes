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
          <!-- youtube video -->
          4          <!--     <a href="http://www.youtube.com/embed/YHWkro9-e9Q?hd=1&wmode=opaque&controls=1&showinfo=0" data-type="video">Youtube video</a>-->
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
                              <a href="#">
                                   <img src="{{Url('/')}}/uploads/back/services/{{$service->img}}">
                                   <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                              </a>
                         </figure>
                         <div class="service-content">
                              <h3><a href="#">{{$service['title_'.Session::get('local')]}}</a></h3>
                              {{ $service['meta_desc_'.Session::get('local')] }}
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
                    <h2>تبحث عن استشارة أو نصيحة؟</h2>
                    <p>لدينا فريق من الخبراء ومستعدون لتقديم الدعم والإرشاد لعملاءنا</p>
               </div>
               <div class="col-sm-3 text-left">
                    <a href="#" class="ask-btn">اطلب الاستشارة الآن!</a>
               </div>
          </div>
     </div>
</section>

<section id="quotes" class="section">
     <div class="container">
          <h1 class="sec-ttl wow fadeInUp">آراء عملاءنا</h1>
          <div class="row">
               <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="quote">
                         <div class="client-img">
                              <img src="{{Url('/')}}/front/images/client-1.jpg">
                         </div>
                         <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة</p>
                         <div class="client-info">
                              <h3>محمد جابر</h3>
                              <span>مصمم مواقع - مؤسسة سوافور</span>
                         </div>
                    </div>
               </div>

               <div class="col-sm-4 wow fadeIn" data-wow-delay="1s">
                    <div class="quote">
                         <div class="client-img">
                              <img src="{{Url('/')}}/front/images/client-2.jpg">
                         </div>
                         <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة</p>
                         <div class="client-info">
                              <h3>محمود خليل</h3>
                              <span>مهندس مدنى</span>
                         </div>
                    </div>
               </div>

               <div class="col-sm-4 wow fadeIn" data-wow-delay="1.5s">
                    <div class="quote">
                         <div class="client-img">
                              <img src="{{Url('/')}}/front/images/client-3.jpg">
                         </div>
                         <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة</p>
                         <div class="client-info">
                              <h3>على محفوظ</h3>
                              <span>مبرمج مواقع</span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>

@endsection
@stop