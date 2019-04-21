@extends('layouts.admin')
@section('content')
  <h1>Edit Posts</h1>
  {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) !!}
  @csrf
  <div class="col-sm-3">
       <img src="{{ $post->photo ? '../../../' .$post->photo->file : '../../../images/default.jpg' }}" class="img-responsive img-rounded">
  </div>
  <div class="col-sm-9">
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
      {!! Form::text('body',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-3 mr-4']) !!}
    </div>
    {!! Form::close() !!}


  {{-- DELETE Button --}}
  {!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id]]) !!}
  <div class="form-group">
    {!! Form::submit('Delete the Post',['class'=>'btn btn-danger col-sm-3']) !!}
  </div>
    {!! Form::close() !!}
    </div>
  <div class="row">
    @include('includes.form_errors')
  </div>
@endsection
