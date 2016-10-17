@extends('main')
@section('title', '| Edit Tag')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {!! Form::model($tag, array('route' => array('tags.update', $tag -> id), 'method' => 'PATCH' )) !!}
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            <div class="row">
                <div class="col-md-3" style="margin-top: 20px; margin-bottom: 20px">
                    {!! Html::linkRoute('tags.show', 'Cancel', array($tag -> id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-md-3" style="margin-top: 20px; margin-bottom: 20px">
                    {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block') ) }}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
