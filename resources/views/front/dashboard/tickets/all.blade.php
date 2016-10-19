@extends('front.dashboard.layout')
@section('breadcrumbs')
    <i class="{{Lang::get('dashboard.arrow')}}"></i>
    {{Lang::get('dashboard.all_tickets')}}
@endsection
@section('title',Lang::get('dashboard.all_tickets'))
@section('dashboard')
    <div class="dashboard-content">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{Lang::get('dashboard.ticketName')}}</th>
                        <th>{{Lang::get('dashboard.ticketStatus')}}</th>
                        <th>{{Lang::get('dashboard.ticketOptions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {!! Form::open() !!}
                    @foreach($tickets as $ticket)
                        <tr>

                            <td><a href="{{Url('/')}}/dashboard/ticket/{{$ticket->id}}">{{$ticket->name}}</a></td>
                            <td>{{($ticket->status == 1 ) ? Lang::get('dashboard.ticketStatusNumTrue') : Lang::get('dashboard.ticketStatusNumFlase')}}</td>
                            <td colspan="10">
                                <a href="{{Url('/')}}/dashboard/ticket/{{$ticket->id}}" class="btn btn-xs btn-warning">{{Lang::get('dashboard.ticketShow')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    {!! Form::close() !!}
                    </tbody>
                </table>
            </div>
        </div>

@endsection
@section('inlineJS')

@endsection
@stop