@extends('layouts.main')
@section('title', "Departments")

@section('content')
<h1 class="ui header" style="text-align: center; margin-top: 20px;">{{$department->name}}</h1>
@include('components.items')
@endsection