@extends('layouts.admin')
@section('content')
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
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->photo }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->active == 1 ? "Active" : "Inactive" }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
          </tr>
        @endforeach

      @endif


    </tbody>
</table>

@endsection
@section('footer')

@endsection
