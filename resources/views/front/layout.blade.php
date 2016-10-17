<?php

use App\Settings;

$settings = Settings::first();
?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
          <title>@yield('title') | {{$settings['site_name_'.Session::get('local')]}}</title>

          <!-- CSS -->
          <link href="{{Url('/')}}/front/css/bootstrap.min.css" rel="stylesheet">
          @if(Session::get('local') !== 'en')
          <link href="{{Url('/')}}/front/css/bootstrap-rtl.min.css" rel="stylesheet">
          @endif
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
          <link href="{{Url('/')}}/front/js/masterslider/style/masterslider.css" rel="stylesheet">
          <link href="{{Url('/')}}/front/js/masterslider/style/masterslider.css" rel="stylesheet">
          <link href="{{Url('/')}}/front/js/masterslider/skins/default/style.css" rel="stylesheet">
          <link href="{{Url('/')}}/front/css/owl.carousel.css" rel="stylesheet">
          <link href="{{Url('/')}}/front/css/animate.css" rel="stylesheet">
          <link href="{{Url('/')}}/front/css/main.css" rel="stylesheet">
          <!-- Start Sweet Alert Library Css File -->
          {!! Html::style('back/assets/global/plugins/sweetAlert/sweetalert.css') !!}
          <!-- End Sweet Alert Library Css File -->

          <!-- J-Query Library -->
          {!! Html::script("back/assets/global/plugins/jquery.min.js") !!}
          <!-- Start Sweet Alert Library Js File -->
          {!! Html::script("back/assets/global/plugins/sweetAlert/sweetalert.min.js") !!}
          <!-- End Sweet Alert Library Js File -->

     </head>
     <body>

          <header>
               <nav class="navbar navbar-default">
                    <div class="container">
                         <!-- Brand and toggle get grouped for better mobile display -->
                         <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                   <span class="sr-only">Toggle navigation</span>
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="{{Url('/')}}"><img src="{{Url('/')}}/front/images/logo.png"></a>
                         </div>

                         <!-- Collect the nav links, forms, and other content for toggling -->
                         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                   <li class="{{(Request::is('/'))?'active':''}}"><a href="{{Url('/')}}">{{Lang::get('index.home')}}</a></li>
                                   <li class="{{(Request::is('aboutComp*'))?'active':''}}" ><a href="{{Url('/')}}/aboutComp">{{Lang::get('index.aboutComp')}}</a></li>
                                   <li class="{{(Request::is('ourServies*'))?'active':''}}" ><a href="{{Url('/')}}/ourServies">{{Lang::get('index.servies')}}</a></li>
                                   <li class="{{(Request::is('contactUs*'))?'active':''}}" ><a href="{{Url('/')}}/contactUs">{{Lang::get('index.contactUs')}}</a></li>
                                   <li class="{{(Request::is('consulting*'))?'active':''}}" ><a href="{{Url('/')}}/consulting">{{Lang::get('index.consulting')}}</a></li>
                                   <li class="{{(Request::is('blog*'))?'active':''}}" ><a href="{{Url('/')}}/blog">{{Lang::get('index.news')}}</a></li>
                              </ul>
                              <ul class="nav navbar-nav navbar-left">
                                   @if(Auth::client()->check() !== false)
                                        <li class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                                 {{-- <img src="{{Url('/')}}/uploads/users/{{Auth::client()->get()->image}}">--}}
                                                  <span>{{Auth::client()->get()->name}}</span>
                                                  <i class="glyphicon glyphicon-menu-down"></i>
                                             </a>
                                             <ul class="dropdown-menu">
                                                  <li>
                                                       <a href="{{Url('/')}}/dashboard">{{Lang::get('dashboard.dashboard')}}</a>
                                                  </li>
                                                  <li>
                                                     <a href="{{Url('/')}}/logout">{{Lang::get('dashboard.logout')}}</a>
                                                  </li>
                                             </ul>
                                        </li>
                                        @else
                                               <li class="nav-btn"><a href="{{ Url('/') }}/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Lang::get('menu.login')}}</a></li>

                                   @endif

                                   <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                             <img src="{!! Url('/') !!}/back/assets/global/img/flags/{{Lang::get('assets.flag')}}" alt=""> {{Lang::get('assets.lang')}}
                                             <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                             <li><a href="{!! Url('/') !!}/lang/en"><img src="{!! Url('/') !!}/back/assets/global/img/flags/us.png" alt=""> English</a></li>
                                             <li><a href="{!! Url('/') !!}/lang/ar"><img src="{!! Url('/') !!}/back/assets/global/img/flags/eg.png" alt="">  العربية </a></li>
                                        </ul>
                                   </li>
                              </ul>
                            {{---
                               <a href="{{Url('/')}}/login">login</a>
                              <a href="{{Url('/')}}/register">register</a>
                              <a href="{{Url('/')}}/logout">logout</a>
                              --}}
                         </div><!-- /.navbar-collapse -->
                    </div><!-- /.container -->
               </nav>
          </header>

          @yield('content') 

          <footer>
               <div class="container wow fadeIn" data-wow-delay="0.5s">
                    <div class="row">
                         <div class="col-sm-4">
                              <div class="contact-item">
                                   <div class="icon">
                                        <i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                                   </div>
                                   <p>
                                        {{  $settings['address_'.Session::get('local')] }}
                                   </p>
                              </div>
                         </div>
                         <div class="col-sm-4">
                              <div class="contact-item">
                                   <div class="icon">
                                        <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                                   </div>
                                   <p> {{ $settings->email }} <br> {{ $settings->email_2 }} </p>
                              </div>
                         </div>
                         <div class="col-sm-4">
                              <div class="contact-item">
                                   <div class="icon">
                                        <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                                   </div>
                                   <p> {{ $settings->phone }} <br> {{ $settings->phone_2  }} </p>
                              </div>
                         </div>
                    </div>

                    <div class="rights">
                         <p>ItagEG &copy; 2016  -  Designed by <a href="#">Sawa4 Corporation</a></p>
                    </div>
               </div>
          </footer>

          <a href="#" class="scrollToTop"></a>

          <!-- JavaScript -->
          <script src="{{Url('/')}}/front/js/jquery.min.js"></script>
          <script src="{{Url('/')}}/front/js/masterslider/masterslider.min.js"></script>
          <script src="{{Url('/')}}/front/js/masterslider/jquery.easing.min.js"></script>
          <script src="{{Url('/')}}/front/js/owl.carousel.min.js"></script>
          <script src="{{Url('/')}}/front/js/wow.min.js"></script>
          <script src="http://maps.google.com/maps/api/js?key=AIzaSyDehRZaR_zs1PxBIkPYJAvPVHSEWaDGaXQ"></script>
          <script src="{{Url('/')}}/front/js/gmaps.js"></script>
          <script src="{{Url('/')}}/front/js/bootstrap.min.js"></script>
          <script src="{{Url('/')}}/front/js/main.js"></script>
          <!-- Nice Scroll Library Js -->
          {!! Html::script("back/assets/global/scripts/jquery.nicescroll.min.js") !!}
          <!-- Nice Scroll Library Js -->
          @yield('inlineJS')
     </body>
</html>