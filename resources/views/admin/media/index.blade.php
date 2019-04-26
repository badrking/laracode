@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if ($photos)
      <form class="form-inline" action="delete/media" method="post">
        @csrf
          <div class="form-group">
              <select class="form-control mr-4" name="checkBoxArray">
                  <option value="">Delete</option>
              </select>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary">
          </div>
              <table class="table">
                <thead>
                  <th> <input id="options" type="checkbox" > </th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Creation Date</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  @foreach ($photos as $photo)
                  <tr>
                    <td> <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"> </td>
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
    </form>
    @endif
@endsection
@section('scripts')
      <script>
          $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                  $('.checkBoxes').each(function(){
                      this.checked = true;
                  });
                } else {
                  $('.checkBoxes').each(function(){
                      this.checked = false;
                  });
                }
            });
          });
      </script>
@endsection
