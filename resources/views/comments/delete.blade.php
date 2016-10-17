@extends('main')
@section('title', '| Edit Comment')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Delete Comment?</h1>
            <p>
                <strong>Name: </strong>{{ $comment->name }}<br>
                <strong>Email: </strong>{{ $comment->email }}<br>
                <strong>Comment: </strong>{{ $comment->comment }}

            </p>
            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
            {{ Form::submit('Yes', ['class' => 'btn btn-danger btn-block btn-lg']) }}
            {{ Html::linkRoute('posts.show', 'No', [$comment->post->id], ['class' => 'btn btn-primary btn-block btn-lg'] ) }}
            {!! Form::close() !!}

        </div>
    </div>
    <hr>
@endsection

