@extends('front.dashboard.layout')
	@section('breadcrumbs')
 		<i class="{{Lang::get('dashboard.arrow')}}"></i>
 		{{Lang::get('dashboard.messages')}}
 	@endsection
 	@section('title',Lang::get('dashboard.messages'))
	@section('dashboard')
		<!-- Start Custom Css File -->
		<link href="{{Url('/')}}/front/css/msg.css" rel="stylesheet">
		<!-- End Custom Css File-->

		<div class="row col-md-10 col-md-offset-1">
			<div class="messages">
				<div class="msgs-wrap" style="overflow: hidden; outline: none;" tabindex="0">
					<ul class="messages form-gourp">
						@foreach($msgs as $msg)
							<li class="message {{($msg->sender == 1)?'right':'left'}} appeared">
								{{-- <div class="avatar"><img class="img-circle" src="@if($msg->sender == 1) {{Url('/')}}/uploads/users/{{Auth::client()->get()->image}} @else {{Url('/')}}/front/images/logo.png @endif" style="width: 50px;height: 50px;"></div> --}}
								<div class="text_wrapper">
									<div class="message right appeared">{{$msg->msg}}</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
				{!!Form::open()!!}
				<div class="new-msg ">
					<div class="input-group">
						<textarea id="message" class="form-control" placeholder="{{Lang::get('dashboard.writeMsgHere')}}" style="" name="msg" ></textarea>
						<button class="btn btn-success" id="send" type="submit"><i class="fa fa-send"></i> {{Lang::get('dashboard.send')}}</button>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	@endsection
	@section('inlineJS')
		<script type="text/javascript">
		    /* Start Messages page */
		    // To scroll to last msg in chat after relode ( after send and redirect back )  
		    $('.msgs-wrap').animate({ scrollTop: $('.msgs-wrap').prop("scrollHeight")},1000);
		        
		        $('#message').keydown(function (event) {
		            var msg = $('#message').val();
		            if(msg.trim() !== ''){
		                if(event.shiftKey && event.keyCode == 13 ) {
		                  
		                }else if(event.keyCode == 13){
		                    event.preventDefault();
		                    $('#message').val(msg.trim());
		                    $('#message').attr( 'disabled' );
		                    $('form').submit();
		                }
		            }
		        });

		        $('#send').click(function(event) {
		            var msg = $('#message').val();
		            $('#message').val(msg.trim());
		            if(msg.trim() == ''){
		               event.preventDefault();
		            }
		        });

		        $(".msgs-wrap").niceScroll({
		         
		        });

		    /* End Messages page */

		</script>
	@endsection
@stop