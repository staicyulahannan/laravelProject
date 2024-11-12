@extends('layouts.master')
@section('content')
<h2>Registration</h2>
<form action="{{Route('register.user')}}" method="POST">
  @csrf
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"class="form-control"  placeholder="Enter Name" value="{{old('name')}}">
    <span class="text danger">@error('name'){{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"name="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}"aria-describedby="emailHelp" placeholder="Enter email">
    <span class="text danger">@error('email'){{$message}} @enderror</span>

</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
    <span class="text danger">@error('password'){{$message}} @enderror</span>

</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{Route('reister')}">Login</a>
@endsection