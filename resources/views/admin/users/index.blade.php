@extends('layouts.admin')
@section('content')
  @if (Session::has('deleted_user'))
    <p class="alert alert-danger">{{ session('deleted_user') }}</p>
  @endif
  @if (Session::has('created_user'))
    <p class="alert alert-success">{{ session('created_user') }}</p>
  @endif
  @if (Session::has('edited_user'))
    <p class="alert alert-info">{{ session('edited_user') }}</p>
  @endif

    <h1>Users</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Photo</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Birth</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if ($users)
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->id}}</th>
            <td><a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td><img width="90px" height="50px" src="{{ $user->photo ? '..'.$user->photo->file : 'Photo Unavaible' }}"></td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->status == 1 ? "Active" : "Inactive" }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td><button class="btn btn-danger">Delete</button></td>
          </tr>
        @endforeach

      @endif


    </tbody>
</table>
<div class="row">
    <div class="col-sm-offset-5">
        {{ $users->render() }}
    </div>
</div>

@endsection
@section('footer')

@endsection
