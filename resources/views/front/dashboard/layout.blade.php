<?php
use App\Msg;
// this line to count all Messages unread .
$new_messages_count = Msg::where('user_id',Auth::client()->get()->id)->where('status', 0)->where('sender', 0)->count();
?>
@extends('front.layout')
     @section('title',Lang::get('dashboard.dashboard'))
     @section('content')
         <section class="page-content">
             <div class="container">
                 <div class="row usr-dashboard">
                     <div class="col-sm-3">
                         <div class="dashboard-links">
                             <ul>
                                 <li class="{{(Request::is('dashboard'))?'active':''}} "><a href="{{Url('/')}}/dashboard"><i class="{{Lang::get('dashboard.arrow')}}"></i> {{Lang::get('dashboard.index')}}</a></li>
                                 <li class="{{(Request::is('dashboard/messages*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/messages"><i class="{{Lang::get('dashboard.arrow')}}"></i> {{Lang::get('dashboard.messages')}} <span class="badge">@if($new_messages_count > 0 ){{$new_messages_count}}@endif</span></a></li>
                                 <li class="{{(Request::is('dashboard/tickets/create'))?'active':''}} "><a href="{{Url('/')}}/dashboard/tickets/create"><i class="{{Lang::get('dashboard.arrow')}}"></i>{{Lang::get('dashboard.sendNewTikets')}}</a></li>
                                 <li class="{{(Request::is('dashboard/tickets'))?'active':''}} "><a href="{{Url('/')}}/dashboard/tickets"><i class="{{Lang::get('dashboard.arrow')}}"></i>{{Lang::get('dashboard.All_previous_tickets')}}</a></li>
                                 <li class="{{(Request::is('dashboard/edit_personal*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/edit_personal"><i class="{{Lang::get('dashboard.arrow')}}"></i>  {{Lang::get('dashboard.edit_personal')}}</a></li>
                                 <li class="{{(Request::is('dashboard/new_testimonial*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/new_testimonial"><i class="{{Lang::get('dashboard.arrow')}}"></i> {{Lang::get('dashboard.openion')}}</a></li>
                                 <li class="{{(Request::is('dashboard/logout*'))?'active':''}}"><a href="{{Url('/')}}/logout"><i class="{{Lang::get('dashboard.arrow')}}"></i> {{Lang::get('dashboard.logout')}}</a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-sm-9">
                         <div class="dashboard-content">
                             <div class="page-bar">
                                 <ul class="page-breadcrumb">
                                     <li>
                                         <a href="{{Url('/')}}">{{Lang::get('dashboard.index')}}</a>
                                         <i class="{{Lang::get('dashboard.arrow')}}"></i>
                                     </li>
                                     <li>
                                         <a href="{{Url('/')}}/dashboard">{{Lang::get('dashboard.dashboard')}}</a>
                                     </li>
                                     <li>
                                         <span>@yield('breadcrumbs')</span>
                                     </li>
                                 </ul>
                             </div>
                             @yield('dashboard')
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     @endsection
@stop