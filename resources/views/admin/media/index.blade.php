@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if ($photos)
    <table class="table">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Creation Date</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($photos as $photo)
        <tr>
          <td>{{ $photo->id }}</td>
          <td><img src="{{ '..'.$photo->file }}" class="img-fluid" width="100px"></td>
          <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() :'Unknown' }}</td>
          <td>
            {!! Form::model($photo,['method'=>'DELETE','action'=>['MediaController@destroy',$photo->id]]) !!}
               @csrf
               <div class="form-group">
                 {!! Form::submit('Delete the Photo',['class'=>'btn btn-danger']) !!}
               </div>
               {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
        <div class="col-sm-offset-5">
            {{ $photos->render() }}
        </div>
    </div>
    @endif
@endsection
