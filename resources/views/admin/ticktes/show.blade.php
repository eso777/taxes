<?php  use Carbon\Carbon ?>
@extends('admin.layout')
@section('title' , 'التذاكر')
@section('content')

    @if(Session::has('msg'))
        <div class="alert alert-success">
            {!! Session::get('msg') !!}
        </div>
    @endif
    @if(Session::has('alert'))
        {!! Session::get('alert') !!}
    @endif

    <div class="form-wrap">
        <div col-md-12>
            <h1 class="form-ttl"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> {{$ticket->name }}</h1>
        </div>
       {!! Form::open() !!}
            <div class="form-group">
                <label>إرسال رد جديد </label>
                <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>أرفق ملف</label>
                <input type="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-success" >إرسال</button>
        {!! Form::close() !!}
    </div>
    <br>
    <br>

    @if(count($ticket_replay) > 0 )

        @foreach($ticket_replay as $one)
            <?php $files = explode('|', $one->attach) ?>
            @if($one->sender == 0) {{-- Sender 0 => User --}}

            <div class="thumbnail client_replay">
                <div class="row">

                    <div class="col-md-3 replay_details">
                        <p class="text-center">رد العميل</p>
                        <p class="text-center"> {{Carbon::parse($one->created_at)->diffForHumans()}}</p>
                    </div>

                    <div class="col-md-9 replay_text">
                        <p>
                            {{$one->content}}
                        </p>

                        @if($one->attach !== "")
                            <ul class="attachments thumbnail">
                               @foreach($files as $file)
                                    <li><a href="{{Url('/')}}/uploads/attachments/{{$file}}"><i class="fa fa-file-o"></i> {{$file }}</a></li>
                               @endforeach

                            </ul>
                        @endif

                    </div>
                </div>
            </div>

            @else {{-- Sender 1 => Admin --}}

                <div class="thumbnail ">
                    <div class="row">

                        <div class="col-md-3 replay_details">
                            <p class="text-center">رد الإدارة</p>
                            <p class="text-center">10-5-2016 02:30 PM</p>
                        </div>

                        <div class="col-md-9 replay_text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa cumque dolor nobis unde! Aliquid, autem commodi consequuntur distinctio dolore dolorem esse laborum odit possimus quae quis totam unde vel.
                            </p>

                            <ul class="attachments thumbnail">
                                <li><a href="#"><i class="fa fa-file-o"></i> image</a></li>
                                <li><a href="#"><i class="fa fa-file-o"></i> pdf</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            @endif

        @endforeach
    @else

    @endif




@endsection

<script type="text/javascript">
    /*$('.conf').click(function(event) {

     event.preventDefault() ;
     });*/

</script>
@stop

