@extends('layouts.admin');
@section('content')

    @if (count($replies)>0)
      <h1>Replies</h1>
        <table class="table">
            <thead>
              <th>Id</th>
              <th>Author</th>
              <th>Body</th>
              <th>Date</th>
              <th>Post</th>
              <th>Comment</th>
              <th>Approve</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach ($replies as $reply)
              <tr>
                <td>{{ $reply->id }}</td>
                <td>{{ $reply->author }}</td>
                <td>{{ str_limit($reply->body,100) }}</td>
                <td>{{ $reply->created_at ? $reply->created_at->diffForHumans() :'Unknown' }}</td>
                <td ><a href="{!! route('home.post',$reply->comment->post->slug) !!}">{{ "View Post" }}</a></td>

                <td><a href="{!! route('comments.index',$reply->comment->id) !!}">View  Comment</a></td>
                <td>
                {{-- Approving --}}
                @if ($reply->is_active == 0)
                  {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                     @csrf
                     <input type="hidden" name="is_active" value="1">
                     <div class="form-group">
                       {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                     </div>
                     {!! Form::close() !!}
                     @else
                       {!! Form::model($reply,['method'=>'PAtCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
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
                  {!! Form::model($reply,['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
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
  @else
    <h1 class="text-center">No replies</h1>
    @endif
@endsection
