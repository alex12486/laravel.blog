@extends('main')
@section('title', '| Edit Post')
@section('stylesheets')
    {!! Html::style('../../../public/css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link',
            menubar: false
        });
    </script>
@endsection
@section('content')
    <div class="row">
        {!! Form::model($post, array('route' => array('posts.update', $post -> id), 'method' => 'PATCH', 'files' => true )) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            {{ Form::label('slug', 'Slug:', array( 'class' => 'form-spacing-top')) }}
            {{ Form::text('slug', null, array('class' => 'form-control')) }}

            {{ Form::label('category_id', 'Category:', array( 'class' => 'form-spacing-top')) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', array( 'class' => 'form-spacing-top')) }}
            {{ Form::select('tags[]', $tags, null, ['class' => ' form-control select2-multiple', 'multiple' => 'multiple']) }}

            {{ Form::label('featured_image', 'Update Featured Image') }}
            {{ Form::file('featured_image') }}

            {{ Form::label('body', 'Body:', array( 'class' => 'form-spacing-top')) }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('j M, Y', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j M, Y', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post -> id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block') ) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    {!! Html::script('../../../public/js/select2.full.min.js') !!}
    <script type="text/javascript">
        $(".select2-multiple").select2();
        $(".select2-multiple").select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
    </script>
@endsection