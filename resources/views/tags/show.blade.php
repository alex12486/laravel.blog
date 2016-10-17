@extends('main')
@section('title', "| $tag->name Tag")
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }}</h1>
        </div>
        <div class="col-md-4">

            <div class="well">
                <div class="row">
                    <div class="col-sm-12">
                        <dl>
                            <label>Number of posts with this tag:</label>
                            <p>{{ $tag->post->count() }} Posts</p>
                        </dl>
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('tags.edit', 'Edit', array($tag -> id), array('class' => 'btn btn-primary btn-block ')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(array('route' => array('tags.destroy', $tag -> id), 'method' => 'DELETE')) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block ')) !!}
                        {!! Form::close()  !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('tags.index', 'See All Tags', array(), array('class' => 'btn btn-block btn-default form-spacing-top')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->post as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>
                                @foreach($post->tags as $tags)
                                    <span class="label label-default">{{ $tags -> name }}</span>
                                @endforeach
                            </td>
                            <th>
                                <a href=" {{ route('posts.show', $post -> id) }}"
                                   class="btn btn-default btn-xs">View</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection