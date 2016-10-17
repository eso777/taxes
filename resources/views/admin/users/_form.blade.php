
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'الأسم') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('name_company') ? ' has-error' : '' }}">
    {!! Form::label('name_company', 'إسم الشركة') !!}
    {!! Form::text('name_company', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name_company') }}</small>
</div>

<div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
    <label for="">{{Lang::get('loginReg.image')}}</label>
    {!!Form::file('img')!!}
    <small class="text-danger">{{ $errors->first('img') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'البريد الألكتروني') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
    {!! Form::label('mobile', 'رقم الموبايل') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('mobile') }}</small>
</div>

<div class="form-group{{ $errors->has('ground-tel') ? ' has-error' : '' }}">
    {!! Form::label('ground-tel', 'رقم التليفون الأرضي (أن وجد)') !!}
    {!! Form::text('ground-tel', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('ground-tel') }}</small>
</div>

<div class="form-group{{ $errors->has('field') ? ' has-error' : '' }}">
    {!! Form::label('field', 'المجال') !!}
    {!! Form::text('field', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
    <small class="text-danger">{{ $errors->first('field') }}</small>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'كلمة السر') !!}
    @if(@$type == 'edit')
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @if(@$alert)
        {!!$alert!!}
        @endif
    @else
        {!! Form::password('password', ['class' => 'form-control','autocomplete'=>'new-password']) !!}   
    @endif
	
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>


<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
		{!! $btnName !!}
	</button>
</div>