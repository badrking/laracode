@extends('layouts.blog-post')
@section('content')



              <!-- Blog Post -->

              <!-- Title -->
              <h1>{{ $post->title }}</h1>

              <!-- Author -->
              <p class="lead">
                  by <a href="#">{{ $post->user->name }}</a>
              </p>

              <hr>

              <!-- Date/Time -->
              <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

              <hr>

              <!-- Preview Image -->
              <img class="img-responsive img-fluid img-rounded" src="{{ $post->photo ? '..'.$post->photo->file : null }}" alt="">

              <hr>

              <!-- Post Content -->
              <p class="lead">{!! $post->body !!}</p>
              <hr>
              @if (Session::has('posted_comment'))
                <p class="alert alert-success">{{ session('posted_comment') }}</p>
              @endif
              @if (Session::has('posted_reply'))
                <p class="alert alert-success">{{ session('posted_reply') }}</p>
              @endif
              <!-- Blog Comments -->
@if (Auth::check())
              <!-- Comments Form -->
              <div class="well">
                  <h4>Leave a Comment:</h4>
                  {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
                      @csrf
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <div class="form-group">
                        {!! Form::label('body','Body') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                      </div>
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
              </div>
              @endif

              <hr>

              <!-- Posted Comments -->

              <!-- Comment -->
              @if (count($comments)>0)
              @foreach ($comments as $comment)
                @if ($comment->is_active == 1)
              <div class="media">
                  <a class="pull-left" href="#">
                      <img class="media-object round_photo" src="{{ '..'.$comment->author_photo }}" class="img-fluid">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading">{{ $comment->author }}
                          <small>{{ $comment->created_at }}</small>
                      </h4>
                    <p>{{ $comment->body }}</p>

                    {{-- Nested Comment --}}
                    @if (count($comment->replies)>=0)
                      @foreach ($comment->replies as $reply)
                        @if ($reply->is_active == 1)

                        <div class="media mt-5">
                        <a class="pull-left" href="#">
                            <img class="media-object round_photo" src="{{ '..'.$reply->author_photo }}" >
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $reply->author }}
                                <small>{{ $reply->created_at }}</small>
                            </h4>
                            <p>{{ $reply->body }}</p>
                            </div>
                          </div>
                          @endif
                        @endforeach
                        @endif

            <div class="comment-reply-container">
              <button class="toggle-reply btn btn-primary pull-right" type="button" name="button">Reply</button>
                <div class="comment-reply col-sm-9">
                  {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}



                      @csrf
                      <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                      <div class="form-group">
                        {!! Form::label('body','Body') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                      </div>
                        {!! Form::close() !!}

                      </div>
                      </div>

              @endif
              @endforeach
              @endif

              <!-- Comment -->

@endsection
@section('scripts')
  <script type="text/javascript">
      $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
      });
  </script>
@endsection
