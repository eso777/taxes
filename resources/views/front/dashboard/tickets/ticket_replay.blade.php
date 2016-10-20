<?php use Carbon\Carbon ?>
@extends('front.dashboard.layout')
@section('breadcrumbs')
    <i class="{{Lang::get('dashboard.arrow')}}"></i>
    {{$tickets->name }}
@endsection
@section('title',Lang::get('dashboard.all_tickets'))
@section('dashboard')


    <div class="form-wrap">
        <div col-md-12>
            <h1 class="form-ttl"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> {{$tickets->name }}</h1>
        </div>

        @if($tickets->status !== 0)

            {!! Form::open(['files'=>true])  !!}

            @if(Session::has('msg'))
                <div class="alert alert-danger">
                    {{Session::get('msg')}}
                    <ul>
                        @foreach (Session::get('files') as $file)
                            <li>{{$file}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                {!! Form::label('content',Lang::get('dashboard.TicDetals')) !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('content') }}</small>
            </div>

            <div class="input_fields_wrap">

                <div class="form-group{{ $errors->has('attached') ? ' has-error' : '' }}">
                    {!! Form::label('attached', Lang::get('dashboard.attachFile')) !!}
                    <div class="input-group">
                        {!! Form::file('attached[]',['class' => 'form-control']) !!}
                        <span class="input-group-btn">
                                <button id="addmore" class="pull-left btn btn-primary" style="margin-top: 0px;padding: 9px;"title="Add More">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                    </div>
                    <small class="text-warning"> <i class="fa fa-sticky-note" aria-hidden="true"></i> {{Lang::get('dashboard.maxFileSize')}}</small>
                    <p class="help-block"></p>
                    <small class="text-danger">{{ $errors->first('attached') }}</small>
                </div>
            </div>

            <br>
            <button type="submit"> <i class="fa fa-check"></i> {{Lang::get('dashboard.send')}}</button>
            {!! Form::close()  !!}
        @else
            <div class="alert alert-info"> {{ Lang::get('dashboard.closeTicket')  }} </div>
        @endif

    </div>
    <br>
    <br>

    @if(count($ticketDetails) > 0 )

        @foreach($ticketDetails as $one)
            <?php $files = explode('|', $one->attach) ?>
            @if($one->sender == 1) {{-- Sender 1 => User --}}

            <div class="thumbnail client_replay">
                <div class="row">

                    <div class="col-md-3 replay_details">
                        <p class="text-center">{{Auth::client()->get()->name}}</p>
                        <p class="text-center"> {{Carbon::parse($one->created_at)->format('Y-m-d  h:i A')}}</p>
                    </div>

                    <div class="col-md-9 replay_text">
                        <p>
                            {{$one->content}}
                        </p>

                        @if($one->attach !== "")
                            <ul class="attachments thumbnail">
                                @foreach($files as $file)
                                    <li><a href="{{Url('/')}}/dashboard/files/{{$file}}"><i class="fa fa-file-o"></i> {{$file }}</a></li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>

            @else {{-- Sender 0 => Admin --}}

            <div class="thumbnail ">
                <div class="row">

                    <div class="col-md-3 replay_details">
                        <p class="text-center">رد الإدارة</p>
                        <p class="text-center">{{Carbon::parse($one->created_at)->format('Y-m-d  h:i A')}}</p>
                    </div>

                    <div class="col-md-9 replay_text">
                        <p>
                            {{$one->content}}
                        </p>

                        @if($one->attach !== "")
                            <ul class="attachments thumbnail">
                                @foreach($files as $file)
                                    <li><a href="{{Url('/')}}/dashboard/files/{{$file}}"><i class="fa fa-file-o"></i> {{$file }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            @endif

        @endforeach
    @else

    @endif




@endsection
@section('inlineJS')
    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $("#addmore"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="input-group"><input class="form-control" name="attached[]" type="file"><span class="input-group-btn"><a class="pull-left btn btn-danger remove_field" style="margin-top: 0px;padding: 9px;color:#fff;"><i class="fa fa-times"></i></a></span></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

                var remo = $(this).parent().parent().hide('slow').remove();
                x--;
            })
        });
        /**************************************** **/
    </script>

@stop