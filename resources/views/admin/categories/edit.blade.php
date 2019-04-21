@extends('layouts.admin')
@section('content')
    <h1>Edit Categories</h1>
    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'PUT','action'=>['AdminCategoriesController@update',$category->id]]) !!}
        @csrf
        <div class="form-group">
          {!! Form::label('name','Category Name') !!}
          {!! Form::text('name',null,['class'=>'fomr-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-4 mr-4']) !!}
        </div>
        {!! Form::close() !!}
        {{--DELETE BUTTON  --}}

    </div>

@endsection
