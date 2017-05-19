@extends('admins.dashboard.main')

@section('stylesheets')
    {{Html::style('css/fileinput.min.css')}}
@endsection

@section('content')
    {!! Form::open(['route' => 'videos.store', 'method' => 'POST', 'files' => true]) !!}
    {{csrf_field()}}
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
    {{ Form::label('series_id', 'Category:') }}
    <select class="form-control" name="series_id">
        <option value="">Select Series</option>
        @foreach($series as $s)
            <option value='{{ $s->id }}'>{{ $s->name }}</option>
        @endforeach
    </select>
    {{ Form::label('video', 'Upload a video') }}
    {{ Form::file('video', ['accept' => 'video/*', 'id' => 'input-1', 'class' => 'form-control file']) }}
    {{ Form::submit('Upload Video', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}
    {!! Form::close() !!}
@endsection

@section('scripts')
    {{Html::script('js/fileinput.min.js')}}
    <script>
        $("#input-1").fileinput({
            showUpload: false,
            allowedFileTypes: ["video"]
        });
    </script>
@endsection