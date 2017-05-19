@extends('admins.dashboard.main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h1>Categories</h1>
            {{--{!! Form::open(['route' => 'get.sub', 'method' => 'POST']) !!}--}}
            {{--{{csrf_field()}}--}}

            {{--{{ Form::label('id', 'Category:') }}--}}
            {{--<select class="form-control" name="id" id="categories">--}}
                {{--@foreach($categories as $category)--}}
                    {{--<option value='{{ $category->id }}'>{{ $category->categoryName }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
            {{--{{ Form::submit('Show Sub Category', ['class' => 'btn btn-danger btn-block']) }}--}}

{{--            {!! Form::close() !!}--}}
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('#categories').on('change', function (event) {
                //event.preventDefault();
                $(this).closest('form').submit();
                var data = {
                    'id': $(this).val()
                };
                console.log(data);
            })
        })
    </script>
@endsection