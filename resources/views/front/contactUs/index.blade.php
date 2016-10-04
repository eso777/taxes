@extends('front.layout') 
@section('title',Lang::get('index.TitleContactUs'))
@section('content')

@if(Session::has('msgSuccess'))
     <div class="alert alert-success">
            {!! Session::get('msgSuccess') !!}
     </div>
@endif

<section class="page-content">
     <div class="page-ttl">
          <div class="container">
               <div class="row">
                    <div class="col-sm-6">
                         <h1><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{Lang::get('index.TitleContactUs')}}</h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb">
                              <li><a href="{{Url('/')}}">{{Lang::get('index.title')}}</a></li>
                              <li class="active">{{Lang::get('index.TitleContactUs')}}</li>
                         </ol>
                    </div>
               </div>
          </div>
     </div>
     <div class="container">
          <div class="row">
               <div class="col-sm-8">
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
                    <!--                         <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> تم إرسال الطلب بنجاح!</div>-->
                    <!--                         <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> من فضلك أكمل الحقول الناقصة!</div>-->
                         {!! Form::open() !!}
                         <div class="form-group"> 

                              <input type="text" class="form-control" id="" name="name" placeholder="{{Lang::get('index.name')}}">
                         </div>
                         <div class="form-group">
                              <input type="text" class="form-control" id="" name="email" placeholder="{{Lang::get('index.email')}}" >
                         </div>
                         <div class="form-group">
                              <input type="phone" class="form-control" name="phone" id="" placeholder="{{Lang::get('index.phone')}}">
                         </div>
                         <div class="form-group">
                              <input type="text" class="form-control" name="about" id="" placeholder="{{Lang::get('index.about')}}">
                         </div>
                         <div class="form-group">
                              <textarea class="form-control" name="subject" placeholder="{{Lang::get('index.subject')}}"></textarea>
                         </div>
                         <button type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{Lang::get('index.btnSend')}}</button>
                         {!! Form::close() !!}
                    </div>
               </div>
               <div class="col-sm-4">
                    <div class="widget">
                         <h2>{{Lang::get('index.companyAddress')}}</h2>
                         <div id="map">
                              <!-- Location Map goes here.. -->
                         </div>
                    </div>
                    <div class="contact-info widget">
                         <h2>{{Lang::get('index.contactInformation')}}</h2>
                         <ul>
                              @if($settings['address_'.Session::get('local')] !== "")
                              <li>
                                   <span class="icon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                   <h4>{{lang::get('index.companyAddress')}}  : {{  $settings['address_'.Session::get('local')] }}</h4>
                              </li>
                              @endif
                              @if($settings->phone !== "")
                              <li>
                                   <span class="icon"><i class="glyphicon glyphicon-phone"></i></span>
                                   <h4>{{lang::get('index.phone')}} : {{  $settings->phone }}</h4>
                              </li>
                              @endif
                              @if($settings->phone_2 !== "")
                              <li>
                                   <span class="icon"><i class="glyphicon glyphicon-headphones"></i></span>
                                   <h4>{{lang::get('index.phone')}} : {{  $settings->phone_2 }}</h4>
                              </li>
                              @endif
                              @if($settings->email !== "")
                              <li>
                                   <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>
                                   <h4> {{lang::get('index.email')}} : {{ $settings->email }}</h4>
                              </li>
                              @endif
                         </ul>
                    </div>
               </div>
          </div>
     </div>
</section>

@endsection
@stop 
