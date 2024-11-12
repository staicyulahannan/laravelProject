@extends('layouts.master')
@section('content')
<form action="{{Route('update.user')}}" method="POST">
<input type="hidden"  name="id"class="form-control"  value="{{encrypt($user->id)}}" placeholder="Enter Name">

  @csrf
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"class="form-control"  value="{{$user->name}}" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password"class="form-control" id="exampleInputPassword1" value="{{$user->password}}" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection