@extends('layout.backend')
@section('content')
<a class="btn btn-primary" href="{{ url('/music/create') }}">New</a>
<h1>music list</h1>
@if (count($musicie) > 0)
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach ($musicie as $music)
                <tr>
                    <td>
                        {!! $music->id !!}
                    </td>
                    <td>
                        <a href="{{ url('/music/' . $music->id) }}">{!! $music->title !!}</a>
                    </td>
                    <td>
                        <p> {!! $music->description !!}</p>
                    </td>
                    <td>
                        <p> {!! $music->location !!}</p>
                    </td>
                    
                    <td><a class="btn btn-primary" href="{!! url('/music/' . $music->id. '/edit') !!}">Edit</a></td>
                    <td>
                    {{ Html::form('DELETE','music/'. $music->id)->open()}}
                <button onclick="return confirmAction()" class="btn btn-danger delete">Delete</button>
                {{ Html::form()->close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<script>
    function confirmAction() {
        let confirmAction = confirm("Are you sure to delete?");
        if (confirmAction == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection