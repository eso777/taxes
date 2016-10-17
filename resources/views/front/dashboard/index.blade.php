 @extends('front.dashboard.layout')
     @section('dashboard')
        @if(Session::has('msg'))
         <div class="alert alert-success alert-dismissible fade in">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             {!! Session::get('msg') !!}</div>
         @endif
     @endsection
@stop