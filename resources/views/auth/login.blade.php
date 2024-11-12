@extends('layouts.master')
@section('content')
<h2>login</h2>
<p>@if(session()->has('message'))
  {{session()->get('message')}}
@endif</p>
<form action="{{Route('login.user')}}" method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <span class="text danger">@error('name'){{$message}} @enderror</span>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
    <span class="text danger">@error('password'){{$message}} @enderror</span>
</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{Route('register')}}">No Account? Register</a>
@endsection