@extends('admins.dashboard.main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->categoryName }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection