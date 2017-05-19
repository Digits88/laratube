@extends('admins.dashboard.main')

@section('content')

    <h3>Add Category</h3>
    <div class="row">
        {!! Form::open(['route' => 'sub.child', 'method' => 'POST']) !!}
        {{csrf_field()}}

        <div class="col-md-6 col-md-offset-2">
            {{ Form::label('category_id', 'Sub Category:') }}
            <select class="form-control" name="subcategory_id">
                @foreach($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->subcategoryName }}</option>
                @endforeach
            </select>
            {{ Form::label('childcategoryName', 'Child Category Name:') }}
            {{ Form::text('childcategoryName', null, ['class' => 'form-control', 'style' => 'margin-bottom: 20px']) }}
        </div>

        {{ Form::submit('Create New Child Category', ['class' => 'btn btn-danger btn-block']) }}

        {!! Form::close() !!}
    </div>

@endsection