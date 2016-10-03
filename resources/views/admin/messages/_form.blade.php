
@if(@$type == 'all')
	<select name="users_id[]" multiple id="id_label_multiple" class='js-example-basic-multiple js-states form-control'>
		@foreach ($users as $user) {
			<option value="{{$user->id}}" selected>{{$user->name}}</option>
		@endforeach
	</select>
@else

{!! Form::select('users_id[]', @$users, null, ['id' => 'id_label_multiple', 'class' => 'js-example-basic-multiple js-states form-control','multiple','selected'=>'selected' ,'placeholder','اختر من هذة القائمة ']) 
!!}

@endif

<div class="form-group{{ $errors->has('msg') ? ' has-error' : '' }}">
    {!! Form::label('msg', 'الرسالة') !!}
    {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('msg') }}</small>
</div>

<button type="submit" class="btn btn-primary">
    <i class="fa fa-send"></i>
	{{  $btnName }}	
</button>

