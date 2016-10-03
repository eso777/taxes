@extends('admin.layout')
@section('title' , 'الأعضاء')
@section('content')
	<div class="col-md-12">
		<div class="col-md-2">
			<a href="{!!Url('/')!!}/admin/users/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		</div>
		

		<div class="col-md-8">
	        <div id="imaginary_container"> 
                {!! Form::open() !!}
	            <div class="input-group stylish-input-group">
	                <input type="text" value="{{$request->q}}" id="search-input" class="form-control"  placeholder="البحث بـــ البريد الألكتروني او اسم الشركة او اسم العميل .." >
	                <span class="input-group-addon">
	                    <button type="submit" id='btnSendSearch'>
	                        <span class="glyphicon glyphicon-search"></span>
	                    </button>  
	                </span>
	            </div>
                {!! Form::close() !!}
	    	</div>
		</div>
		

	</div> <br /> <br />
	<br /> <br />

	@if($request->has('q'))
		<div class="lable label-info" style="padding:6px">
			نتيجة البحث لـــ : {{ $request->q }} <a class="pull-right " href="{{Url('/')}}/admin/users" >رجوع <i class='fa fa-arrow-left'></i></a>
			@if($users->total() > 0) 
			| عدد نتائج البحث : [ {{ $users->total() }} ]
			@endif
		</div>
	@endif

	@if(Session::has('alert'))
		{!! Session::get('alert') !!}
	@endif

	<br>

{{-- Start Defalut View --}}
@if($users->total() > 0)
	<div class="panel panel-primary">
		<div class="panel-heading text-center">عدد الأعضاء :( {{ $usersCount }} )
		|   الأعضاء المفعلين : ( {{ $usersActive }} ) |   الأعضاء الغير مفعلين : ( {{$usersDisActive }} ) 
		</div>
		<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>الأسم</th>								
						<th>البريد الألكتروني</th>								
						<th>إسم الشركة</th>								
						<th>خيارات</th>								
					</tr>
				@foreach($users as $user)
				<tr @if($user->status == 0) style="background-color:#c1bbbb" @endif>
						
							{{-- <td> {!! Form::checkbox('selected[]',$user->id,false,['class'=>'selectedCheckbox']) !!}	 --}}
							
							<!-- @if($user->status !== 0)
							<input type="checkbox" name="selected[]" value="{{$user->id}}" class="selectedCheckbox md-check" >
							@endif </td> -->
						
						<td>{{ $user->name }}</td>		
						<td>{{ $user->email }}</td>		
						<td>{{ $user->name_company }}</td>		
						<td>					
							 	
								<a href="{!!Url('/')!!}/admin/users/{{$user->id}}/edit" class="btn btn-info">
								<i class='fa fa-edit'></i>تعديل</a>
								
								{{-- {!! Form::submit('حذف' , ['class'=>'btn btn-danger conf','data-val-text' =>"سيتم حذف هذا العضو هل انت متأكد من الحذف ؟", 'data-val-title'=>'حذف العضو : ' . $user->name]) !!} --}}

								@if($user->status == 0)
									<a href="{!!Url('/')!!}/admin/users/{{$user->	id}}/status" class="btn btn-success">
									<i class="fa fa-check"></i>
									تفعيل	
									</a>									
								@else
									<a href="{!!Url('/')!!}/admin/users/{{$user->id}}/status" class="btn btn-danger">
									<i class="fa fa-times"></i>تعطيل
									</a>									
								@endif
								
								@if($user->status == 1)
									<a href="{!!Url('/')!!}/admin/messages/getMsgs/{{$user->id}}" class="btn btn-success">
									<i class='fa fa-paper-plane'></i>رسالة خاصة </a>
								@endif

							
						</td>								
					</tr>
				@endforeach 
				</table>
				<a href="{!! Url('/') !!}/admin/users/send/msg" class="btn btn-success"><i class='fa fa-paper-plane'></i>رسالة جماعية</a>
			
			{!!$users->appends(['q'=>$request->q])->render()!!}
			
		</div>	
	</div>
@else
	<div class="nice-msg">لا توجد بيانات للعرض.</div> 
@endif

<!-- 
	***  Start JS CODE  *** 
 -->
<script src="//code.jquery.com/jquery.js"></script>

<script>

$(document).ready(function() {

// Count :checked and add attr disabld 
	/*$(".selectedCheckbox").change(function() {
	if(!this.checked) 
	{	
		$("#selectAll").prop('checked',false);
	}
	});
	$(".selectedCheckbox").change(function() {

		($(".selectedCheckbox:checked").length >= 1) ? $('#sendAll').removeAttr('disabled') :$('#sendAll').attr('disabled', 'disabled');
 
	});
	
	$("#selectAll").change(function() {
		($("#selectAll:checked").length >= 1) ? $('#sendAll').removeAttr('disabled') :$('#sendAll').attr('disabled', 'disabled');
    
	});

$("#selectAll").change(function() {
	if(this.checked) 
	{	
		//alert("changed") ;

		$('.selectedCheckbox').prop('checked', this.checked);
	}else
	{
		$('.selectedCheckbox').prop('checked', false);
		
	}
});
    */	
});
// End document Ready
/********************************************************************/
 	/* Start search   */   
    $('#btnSendSearch').on('click',function(e) {
		e.preventDefault() ;
		if($('#search-input').val().trim() !== '')
		{
			window.location = '{{Url("/")}}/admin/users/?q=' + $('#search-input').val().trim();
		}
	    });
    /* Start search   */   

/********************************************************************/

</script> 

@endsection
@stop





