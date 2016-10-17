@extends('main')
@section('title', '| Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag -> id }}</th>
                        <td>{{ $tag -> name }}</td>
                        <td><a href=" {{ route('tags.show', $tag -> id) }}"
                               class="btn btn-default btn-xs">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $tags -> links() !!}
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

                <h3 class="text-center">New Tag</h3>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}


                {!! Form::close() !!}
            </div>
        </div>
    </div>




    <hr>
@endsection