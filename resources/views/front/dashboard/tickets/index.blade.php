@extends('front.dashboard.layout')
@section('title',Lang::get('dashboard.tickets'))
@section('breadcrumbs')
<i class="{{Lang::get('dashboard.arrow')}}"></i>
{{Lang::get('dashboard.tickets')}}
@endsection

@section('dashboard')
    <div class="form-wrap">
            <h1 class="form-ttl"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> {{Lang::get('dashboard.sendNewTic')}}</h1>
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


                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name',Lang::get('dashboard.ticName')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

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
                        <small class="text-warning"> <i class="fa fa-sticky-note" aria-hidden="true"></i> {{Lang::get('dashboard.maxFileSize')}}{{ $max_size}}</small>
                        <p class="help-block"></p>
                        <small class="text-danger">{{ $errors->first('attached') }}</small>
                    </div>
                </div>

        <br>
                <button type="submit"> <i class="fa fa-check"></i> {{Lang::get('dashboard.send')}}</button>
        {!! Form::close()  !!}
    </div>

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
        /** ************************************** **/
    </script>
@endsection

@endsection
@stop
