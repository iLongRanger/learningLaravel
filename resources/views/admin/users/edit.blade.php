@extends('layouts.admin')


@section('content')


    <h1>Edit User</h1>

    @include('includes.form_error')
    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : '/images/boss .png'}}" alt="" class="img-responsive img-rounded">

    </div>


        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=> true])!!}

            <div class="form-group">
                {!!Form::label('name', 'Name:')!!}
                {!!Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('email', 'Email:')!!}
                {!!Form::email('email', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('role_id', 'Role:')!!}
                {!!Form::select('role_id', [''=>'Choose Position'] + $roles, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('photo_id', 'Upload Another Photo:')!!}
                {!!Form::file('photo_id',null , ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!!Form::label('is_active', 'Status:')!!}
                {!!Form::select('is_active', array(1=>'Active',0=>'Inactive'), null,  ['class'=>'form-control'])!!}
            </div>


            <div class = "form-group">
                {!!Form::submit('Update', ['class'=>'btn btn-primary'])!!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>





@endsection