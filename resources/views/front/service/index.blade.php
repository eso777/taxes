@extends('front.layout')
@section('title' , Lang::get('services.title'))

@section('content')

     <section class="page-content">
        <div class="page-ttl">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>  {{ Lang::get('services.title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li><a href="{{Url('/')}}">{{ Lang::get('index.title') }}</a></li>
                            <li class="active">{{ Lang::get('services.title') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if($service->total() > 0)
            <div class="container">
                <div class="row">
                    @foreach( $service as $service_one )
                        <div class="col-sm-6">
                            <div class="blog-post">
                                <a href="{{ Url('/') }}/servies/{{ $service_one->id }}-{{$service_one['slug_'.Session::get('local')]}}" class="blog-post-thumb">
                                    @if($service_one->img !== "")
                                        <img src="{{ Url('/') }}/uploads/back/services/{{ $service_one->img }}">
                                    @else
                                        <img src="https://dummyimage.com/600x400/#252536/fff.png&text=No+Image">
                                    @endif
                                </a>
                                <div class="blog-post-content">
                                    <h3><a href="{{ Url('/') }}/servies/{{ $service_one->id }}-{{$service_one['slug_'.Session::get('local')]}}">{{ str_limit($service_one['title_'.Session::get('local')],30)  }}</a></h3>
                                    <p>
                                        {{ strip_tags(str_limit($service_one['meta_desc_'.Session::get('local')],200))  }}
                                    </p>
                                    <a href="{{ Url('/') }}/servies/{{ $service_one->id }}-{{$service_one['slug_'.Session::get('local')]}}" class="more-btn">{{ Lang::get('services.details').'...'}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="text-center">
                    <!-- <a href="#" class="load-more">تحميل المزيد</a>-->
                    <div class="paginate">{!! $service->render() !!}</div>
                </div>
            </div>
        @else
            <div class="well text-center"> <h3>{{ Lang::get('index.noArticles') }}</h3> </div>
        @endif

    </section>


@endsection
@stop