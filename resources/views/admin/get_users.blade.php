@extends('layouts.master')
@section('content')
<p>@if(session()->has('message'))
  {{session()->get('message')}}
@endif</p>
<table class="table">
    <a href="{{Route('create.user')}}" class="btn btn-primary">Create</a>
<thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach($users as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        @if($user->trashed())<a class="btn btn-success" href="{{route('activate.user', encrypt($user->id))}}">Activate</a>@endif
      <a class="btn btn-primary" href="{{route('edit.user', encrypt($user->id))}}">Edit</a>
      <a class="btn btn-danger" href="{{route('delete.user', encrypt($user->id))}}">Delete</a>
      <a class="btn btn-info" href="{{route('force.delete.user', encrypt($user->id))}}">Force Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div> {{ $users->links('pagination::bootstrap-5') }}</div>
@endsection