@extends('layouts.master')
@section('content')
<form action="{{Route('save.user')}}" method="POST">
  @csrf
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"class="form-control"  placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection