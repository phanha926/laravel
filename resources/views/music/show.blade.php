@extends('layout.backend')
@section('content')
    <h1>Music details</h1>
    <p>title: {{$music->title}}</p>
    <p>description: {{$music->description}}</p>
    <p>location: {{$music->location}}</p>
    <a class="btn btn-secondary" href="{{route('music.list')}}">Back</a>
@endsection