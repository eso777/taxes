@extends('admin.layout')
	@section('title','admin panel')
	@section('content')

		<div class=" home-stat text-center">
			<h1 class="text-center"> Dashboard </h1>

			<div class="row">
				<div class="col-md-3">
					<div class="stat stat-members">
						<i class="fa fa-users"></i>
						<div class="info">
							عدد الاعـضاء
							<span><a href="{{Url('/')}}/admin/users" title="View Members">{{$countUser}}</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="stat stat-pind">
						<i class="fa fa-comment"></i>
						<div class="info">
							الإستشارات
							<span>
                                   <a href="{{Url('/')}}/admin/consulting" title="عـرض الإستشارات">
										{{$countConsulting}}
                                   </a>
                              </span>
						</div>
					</div>

				</div>
				<div class="col-md-3">
					<div class="stat stat-comment">
						<i class="fa fa-comments"></i>
						<div class="info">
							الـخدمات
							<span><a href="{{Url('/')}}/admin/services" title="عـرض الخـدمات">{{$countService}}</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="stat stat-pind">
						<i class="fa fa-bullhorn"></i>
						<div class="info">
							الإعـلانات
							<span><a href="{{Url('/')}}/admin/ads" title="عـرض الإعلانات">{{$countAds}}</a></span>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

	@endsection
@stop
