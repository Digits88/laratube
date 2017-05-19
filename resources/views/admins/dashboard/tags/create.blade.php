@extends('admins.dashboard.main')

@section('content')

    <h3>Add Tag</h3>
    <div class="row">
        {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
        {{csrf_field()}}
        <div class="col-md-6">
            {{ Form::label('tagName', 'Name:') }}
            {{ Form::text('tagName', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-6">
            {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection