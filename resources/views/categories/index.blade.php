@extends('main')
@section('title', '| Categories')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category -> id }}</th>
                        <td>{{ $category -> name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $categories -> links() !!}
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

                <h3 class="text-center">New Category</h3>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}


                {!! Form::close() !!}
            </div>
        </div>
    </div>




    <hr>
@endsection