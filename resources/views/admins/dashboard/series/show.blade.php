@extends('admins.dashboard.main')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <p>Series Name: {{$series->name}}</p>
                <p>Tag name: {{$series->tag->tagName}}</p>
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($series->videos as $video)
                        <tr>
                            <td>{{$video->title}}</td>
                            <td>{{$video->description}}</td>
                            <td>{{$video->slug}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end: page -->

    </div> <!-- end Panel -->

@endsection