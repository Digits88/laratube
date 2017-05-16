@extends('admins.dashboard.main')

@section('content')

    <h3>Add Category</h3>
    <div class="row">
        {!! Form::open(['route' => 'sub.store', 'method' => 'POST']) !!}
        {{csrf_field()}}

        <div class="col-md-6 col-md-offset-2">
            {{ Form::label('category_id', 'Category:') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->categoryName }}</option>
                @endforeach
            </select>
            {{ Form::label('subcategoryName', 'Sub Category Name:') }}
            {{ Form::text('subcategoryName', null, ['class' => 'form-control', 'style' => 'margin-bottom: 20px']) }}
        </div>

        {{ Form::submit('Create New Sub Category', ['class' => 'btn btn-danger btn-block']) }}

        {!! Form::close() !!}
    </div>

@endsection