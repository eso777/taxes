					
@extends('front.layout')

@section('content')

<div class="clearfix"></div>
    <div id="page_videos">
        <div class="about-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-xs-12">
                        <div class="login_page">
                            <div class="img-div">
                                <img class="img-responsive" src="{!!Url('front/')!!}/images/logo-top.png">
                                
                            </div>
                    <h3>{!!Lang::get('menu.login')!!}</h3>
                    @if (count($errors) > 0)
						<div class="alert alert-danger">
							{!!Lang::get('assets.whoops')!!}
							<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                            <div class="login-details">
                                <div class="col-md-12 col-xs-12">
                                    {!!Form::open()!!}
                                            <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="text" placeholder="{!!Lang::get('index.email')!!}">
                                        </div>
                                        <div class="form-group">
                         
                                            <input type="password" name="password" class="form-control" id="Password" placeholder="{!!Lang::get('index.pass')!!}">
                                        </div>
								  		<div class="checkbox">
											<input id="check1" type="checkbox" name="check" value="check1">
								            <label for="check1">{!!Lang::get('index.remember')!!} <span><a href="#"> {!!Lang::get('index.forget')!!}</a></span></label>

                                        </div>
                                        <div class="button-bottom">
                                            <span> <a href="{!!Url('sign_up')!!}">{!!Lang::get('index.sign_up')!!}</a></span>
                <button type="submit" class="btn btn-default hvr-bounce-to-bottom">{!!Lang::get('menu.login')!!}</button>
                                            </div>
                                  	{!!Form::close()!!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!--end-login-div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@stop