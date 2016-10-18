 @extends('front.dashboard.layout')
 	@section('breadcrumbs')
 		<i class="{{Lang::get('dashboard.arrow')}}"></i>
 		{{Lang::get('dashboard.edit_personal')}}
 	@endsection

 	@section('title',Lang::get('dashboard.edit_personal'))
    @section('dashboard')
    <h1 class="dashboard-ttl">{{Lang::get('dashboard.edit_personal')}}</h1>
    {!!Form::model($user,['files'=>true])!!}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {!!Lang::get('assets.whoops')!!}
                <br>
            </div>
        @endif
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{Session::get('msg')}}
            </div>
        @endif

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', Lang::get('loginReg.username')) !!}
            <input type="text"  class="form-control" disabled="" value="{{$user->name}}">
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>

        <div class="form-group{{ $errors->has('name_company') ? ' has-error' : '' }}">
            {!! Form::label('name_company', Lang::get('loginReg.name_company')) !!}
            <input type="text"  class="form-control" disabled="" value="{{$user->name_company}}">
            <small class="text-danger">{{ $errors->first('name_company') }}</small>
        </div>


        <div class="col-md-12">
            <div class="row">
                @if($type == 'edit')
                    <div class=""><img class="img-circle" src="{{Url('/')}}/uploads/users/{{$user->image}}" alt="" style="width: 100px;height: 100px">  </div>
                @endif
            </div>
        </div>
         <div class="col-md-12">
            <div class="row form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                <label for="">{{Lang::get('loginReg.image')}}</label>
                {!!Form::file('img')!!}
                <small class="text-danger">{{ $errors->first('img') }}</small>
                @if($type == 'edit'){!! '<small class="text-danger"> leave blank to keep it </small>' !!}@endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', Lang::get('loginReg.email')) !!}
            {!! Form::email('email', null, ['class' => 'form-control' , 'autocomplate'=>'off']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>

        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {!! Form::label('mobile', Lang::get('loginReg.mobile')) !!}
            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
        </div>

        <div class="form-group{{ $errors->has('ground-tel') ? ' has-error' : '' }}">
            {!! Form::label('ground-tel', Lang::get('loginReg.ground-tel')) !!}
            {!! Form::text('ground-tel', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('ground-tel') }}</small>
        </div>

        <div class="form-group{{ $errors->has('field') ? ' has-error' : '' }}">
            {!! Form::label('field', Lang::get('loginReg.field')) !!}
            {!! Form::textarea('field', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('field') }}</small>
        </div>

        <div class="form-group{{ $errors->has('pwd') ? ' has-error' : '' }}">
            {!! Form::label('pwd', Lang::get('loginReg.password')) !!}
            {!! Form::password('pwd',  ['class' => 'form-control','autocomplete'=>'new-password']) !!}
            <small class="text-danger">{{ $errors->first('pwd') }}</small>
            @if($type == 'edit'){!! '<small class="text-danger"> leave blank to keep it </small>' !!}@endif
        </div>

        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            {!! Form::label('password_confirmation', Lang::get('loginReg.passwordConf')) !!}
            {!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
        </div>--}}

        <button type="submit" class="btn btn-success">{{Lang::get('loginReg.save')}} <i class="fa fa-check"></i></button>




    {!!Form::close()!!}
    @endsection
@stop