<?php use App\Ticket_replay ;?>
@extends('front.dashboard.layout')
@section('breadcrumbs')
    <i class="{{Lang::get('dashboard.arrow')}}"></i>
    {{Lang::get('dashboard.all_tickets')}}
@endsection
@section('title',Lang::get('dashboard.all_tickets'))
@section('dashboard')
    @if($tickets->total() > 0)
    <div class="dashboard-content">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{Lang::get('dashboard.ticketName')}}</th>
                        <th>{{Lang::get('dashboard.ticketStatus')}}</th>
                        <th>{{Lang::get('dashboard.ticketLastReplay')}}</th>
                        <th>{{Lang::get('dashboard.ticketOptions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {!! Form::open() !!}
                    @foreach($tickets as $ticket)
                        <tr>

                            <td><a href="{{Url('/')}}/dashboard/ticket/{{$ticket->id}}">{{$ticket->name}}</a></td>
                            <td>{{($ticket->status == 1 ) ? Lang::get('dashboard.ticketStatusNumTrue') : Lang::get('dashboard.ticketStatusNumFlase')}}</td>
                            <td>
                            <?php   $unread = Ticket_replay::where('ticket_id',$ticket->id)->where('status',0)->where('sender',0)->count() ?>
                                {!!  ($unread > 0 ) ? '<span class="text-danger">'.Lang::get('dashboard.unreadMsgFoundReplay').'</span>':  Lang::get('dashboard.unreadMsgFoundReplayNo') !!}
                            </td>
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
        @else
            <div class="alert alert-info"> {{ Lang::get('dashboard.NoTicketsYet') }}</div>
    @endif

    <div>{{$tickets->render() }}</div>
@endsection
@section('inlineJS')

@endsection
@stop