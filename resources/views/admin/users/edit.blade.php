@extends('layouts.admin')
@section('content')
<h1 class="mb-5">Edit User</h1>
{{-- MODEL gives the value stored back while the OPEN show empty fields --}}
{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
@csrf
<div class="row">
  <div class="col-sm-3">
      <img src="{{ $user->photo ? '../../'.$user->photo->file : '../../../images/default.jpg'  }}" class="img-responsive img-rounded">
  </div>
  <div class="col-sm-9">
    <div class="form-group">
          {!! Form::label('name','Name') !!}
          {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::label('email','Email') !!}
          {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::label('password','Password') !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::label('photo_id','Photo') !!}
          {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::label('role_id','Role') !!}
          {!! Form::select('role_id', $roles,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::label('status','Status') !!}
          {!! Form::select('status',array(1=>'Active',0=>'Inactive'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
          {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-3 mr-2']) !!}
    </div>
    {!! Form::close() !!}
      {{-- DELETE Button --}}
    {!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
    @csrf
      <div class="form-group">
          {!! Form::submit('Delete The User',['class'=>'btn btn-danger col-sm-3']) !!}
      </div>
      {!! Form::close() !!}
  </div>

</div>





<div class="row">
  @include('includes.form_errors')
</div>

@endsection
