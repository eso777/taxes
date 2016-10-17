 @extends('front.dashboard.layout')
 	@section('breadcrumbs')
 		<i class="{{Lang::get('dashboard.arrow')}}"></i>
 		{{Lang::get('dashboard.wishlist')}}
 	@endsection

 	@section('title',Lang::get('dashboard.wishlist'))
    @section('dashboard')
    	<table class="table table-responsive table-striped table-bordered">
    		<thead>
    			<th>#</th>
    			<th>{{Lang::get('dashboard.name')}}</th>
    			<th>{{Lang::get('dashboard.type')}}</th>
    			<th colspan="2" width="10%" class="text-center">{{Lang::get('dashboard.options')}}</th>
    		</thead>
    		<?php $i = ($wishlist->currentPage() * $wishlist->perPage())-$wishlist->perPage()+1; ?>
    		@foreach($wishlist as $list)
    		<tr>	
    			<td width="1%">{{$i}}</td>
    			@if($list->type == 1)
    				<td>{{$hotels->find($list->list_id)['name_'.Session::get('local')]}}</td>
    			@elseif($list->type == 2)
    				<td>{{$travels->find($list->list_id)['name_'.Session::get('local')]}}</td>
    			@endif
    			<td>{{$type[$list->type]}}</td>
    			<td><a href="{{Url('/')}}/{{($list->type == 1)?'hotels':'travels'}}/{{$list->list_id}}-{{($list->type == 1)?$hotels->find($list->list_id)['slug_'.Session::get('local')]:$travels->find($list->list_id)['slug_'.Session::get('local')]}}" class="btn btn-success">{{Lang::get('dashboard.visit')}}</a></td>
    			<td><a href="{{Url('/')}}/dashboard/wishlist/{{$list->id}}/delete" class="btn btn-danger">{{Lang::get('dashboard.delete')}}</a></td>
    		</tr>	
    		<?php $i++; ?>
    		@endforeach
    	</table>
    	{!! $wishlist->render() !!}
    @endsection
@stop
