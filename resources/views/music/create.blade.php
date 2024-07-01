@extends('layout.backend')

@section('content')
    <h1>Create Music</h1>
    @if(Session::has('music_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('music_create') !!}
    </div>
    @endif
    @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Something is Wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Html::form('POST','/music')->open() !!}
    {!! Html::label('Title: ','title') !!}
    {!! Html::input('text','title', '')->class('form-control')  !!}
    <br>
    {!! Html::label('Description: ','description') !!}
    {!! Html::textarea('description', '')->class('form-control') !!}
    <br>
    <br>
    {!! Html::label('Location: ','location') !!}
    {!! Html::textarea('location', '')->class('form-control') !!}
    <br>
    {{ Html::submit('Create')->class('btn btn-primary') }}
    <a class="btn btn-secondary" href="{{route('music.list')}}">Back</a>
    {!! Html::form()->close() !!}
@endsection