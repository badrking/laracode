@extends('layouts.admin')
@section('content')
  <h1 class="mb-5">Create a Post</h1>
  {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true]) !!}
  @csrf
      <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',[''=>'Choose a Category']+$categories,null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
            {!! Form::label('photo_id','Photo') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
            {!! Form::label('body','Content') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
      </div>
      <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}



  <div class="row">
    @include('includes.form_errors')
  </div>
@endsection
