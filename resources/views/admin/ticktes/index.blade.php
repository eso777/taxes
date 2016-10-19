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


    @if($ticket->total() > 0 )
        <ul class="list-group">
            @foreach ($ticket as $one)
                <li class="list-group-item">
                        <a href="{!! Url('/') !!}/admin/ticktes/{{$one->id}}">
                            {!! $one->name !!}
                        </a>
                    @if($one->status == 1)

                        <a class="pull-right btn btn-danger btn-sm" style=" font-size: 12px; padding: 5px 18px 6px 18px;
                        margin: -4px;" href="{!! Url('/') !!}/admin/ticktes/{{$one->id}}/switch">اغلاق التذكرة</a>
                    @else
                        <a class="pull-right btn btn-success btn-sm" style="font-size: 12px;padding: 6px 28px 5px 20px;margin: -7px -7px -4px -4px;" href="{!! Url('/') !!}/admin/ticktes/{{$one->id}}/switch">فتح التذكرة</a>
                    @endif
                </li>
            @endforeach
        </ul>

        {{ $ticket->render() }}
    @else
        <div class="nice-msg">لا توجد تذاكر للعرض .</div>
    @endif


@endsection

<script type="text/javascript">
    /*$('.conf').click(function(event) {

     event.preventDefault() ;
     });*/

</script>
@stop

