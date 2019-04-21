@extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
        @csrf
        <div class="form-group">
          {!! Form::label('name','Category Name') !!}
          {!! Form::text('name',null,['class'=>'fomr-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
    </div>
    <div class="col-sm-6">
      @if ($categories)
          <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Create date</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as  $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('categories.edit',$category->id) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'Unknown'}}</td>
                    <td>
                      {!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                      @csrf
                      <div class="form-group">
                        {!! Form::submit('Delete Category',['class'=>'btn btn-danger']) !!}
                      </div>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          @endif
    </div>
@endsection
