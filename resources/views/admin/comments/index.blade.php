@extends('layouts.admin');
@section('content')

    @if (count($comments)>0)
      <h1>Comments</h1>
        <table class="table">
            <thead>
              <th>Id</th>
              <th>Author</th>
              <th>Body</th>
              <th>Date</th>
              <th>Post</th>
              <th>Replies</th>
              <th>Approve</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach ($comments as $comment)
              <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ str_limit($comment->body,100) }}</td>
                <td>{{ $comment->created_at ? $comment->created_at->diffForHumans() :'Unknown' }}</td>
                <td ><a href="{!! route('home.post',$comment->post->slug) !!}">{{ "View Post" }}</a></td>
                <td><a href="{!! route('replies.show',$comment->id) !!}">View Replies</a></td>
                <td>
                {{-- Approving --}}
                @if ($comment->is_active == 0)
                  {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                     @csrf
                     <input type="hidden" name="is_active" value="1">
                     <div class="form-group">
                       {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                     </div>
                     {!! Form::close() !!}
                     @else
                       {!! Form::model($comment,['method'=>'PAtCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                          @csrf
                          <input type="hidden" name="is_active" value="0">
                          <div class="form-group">
                            {!! Form::submit('Unapprove',['class'=>'btn btn-success']) !!}
                          </div>
                          {!! Form::close() !!}
                @endif
                </td>
                <td>
                  {{-- DELETE --}}
                  {!! Form::model($comment,['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                     @csrf
                     <div class="form-group">
                       {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                     </div>
                     {!! Form::close() !!}
                </td>
              </tr>
          @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-offset-5">
            {{ $comments->render() }}
        </div>
    </div>
  @else
    <h1 class="text-center">No Comments</h1>
    @endif
@endsection
