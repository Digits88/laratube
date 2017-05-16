@extends('admins.dashboard.main')

@section('content')

    <h3>Add Category</h3>
    <div class="row">
        {!! Form::open(['route' => 'main.store', 'method' => 'POST']) !!}
        {{csrf_field()}}
        <div class="col-md-6 col-md-offset-2">
            {{ Form::label('categoryName', 'Name:') }}
            {{ Form::text('categoryName', null, ['class' => 'form-control', 'style' => 'margin-bottom: 20px']) }}
        </div>

        {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']) }}

        {!! Form::close() !!}
    </div>

@endsection