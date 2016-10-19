@extends('front.dashboard.layout')
@section('breadcrumbs')
    <i class="{{Lang::get('dashboard.arrow')}}"></i>
    {{$tickets->name }}
@endsection
@section('title',Lang::get('dashboard.all_tickets'))
@section('dashboard')
    <div class="dashboard-content">


    </div>

@endsection
@section('inlineJS')

@endsection
@stop