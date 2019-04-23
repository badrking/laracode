@extends('layouts.admin')
@section('content')
  @if (Session::has('deleted_post'))
    <p class="alert alert-danger">{{ session('deleted_post') }}</p>
  @endif
  @if (Session::has('created_post'))
    <p class="alert alert-success">{{ session('created_post') }}</p>
  @endif
  @if (Session::has('edited_post'))
    <p class="alert alert-info">{{ session('edited_post') }}</p>
  @endif
  <h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tilte</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Photo</th>
      <th scope="col">Body</th>
      <th scope="col">View</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @if ($posts)
      @foreach ($posts as $post)
        <tr>
          <th scope="row">{{ $post->id}}</th>
          <td><a href="{{ route('posts.edit',$post->id) }}">{{ $post->title }}</a></td>
          <td>{{ $post->user->name }}</td>
          <td>{{ $post->category ? $post->category->name : "Uncategorized" }}</td>
          <td><img width="90px" height="50px" src="{{ $post->photo ? '..'.$post->photo->file : 'Photo Unavaible' }}"></td>
          <td>{{ str_limit($post->body,100) }}</td>
          <td><a href="{!! route('home.post',$post->id) !!}">{{ "View Post" }}</a> </td>
          <td>{{ $post->created_at->diffForHumans() }}</td>
        </tr>
      @endforeach

    @endif


  </tbody>
</table>
@endsection
