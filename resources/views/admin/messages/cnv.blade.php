@extends('admin.layout')
@section('title', @$user->name)
@section('content')
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-body col-md-11">
			<div class="col-lg-12">
				<p style="padding:10px;">محادثه مع العضو : {{@$user->name}}</p>
				<hr />
				<div class="messages">
					<div class="msgs-wrap">
						<ul class="messages form-gourp">
							@if($messages->count() > 0)
								@foreach($messages as $msg)
									@if($msg->sender == 0)
										<li class="message right appeared">
											<div class="avatar"></div>
											<div class="text_wrapper">
												<div class="message right appeared">{{$msg->msg}}</div>
											</div>
										</li>
									@elseif ($msg->sender == 1)
										<li class="message left appeared ">
											<div class="avatar"></div>
											<div class="text_wrapper">
												<div class="message left appeared msg-left">{{$msg->msg}}
												</div>
											</div>
										</li>
									@endif
								@endforeach
							@endif
						</ul>
					</div>

					@if($user->status == 1)
						{!! Form::open() !!}
						<div class="new-msg" style="">
							<div class="input-group">
								<textarea id="message" class="form-control" placeholder="اكتب رسالتك هنا" style="" name="msg" cols="50" rows="10"></textarea><br /><br />
								<button class="btn btn-success" id="send" type="submit"><i class="fa fa-send"></i>إرسال</button>
							</div>
						</div>
						{!! Form::close() !!}
					@else
						<div class="alert alert-info small">{{ 'عفوا .. لا يمكن مراسلة  هذا العضو لأنة غير مفعل ' }}</div>					
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@stop