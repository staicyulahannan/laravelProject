@extends('layouts.master')
@section('content')
<h2>Dashboard</h2>
<table><tr><td>Name</td><td>
    {{$user->name}}
</td></tr>
</table>
<a href="{{route('logout')}}">Logout</a>
@endsection