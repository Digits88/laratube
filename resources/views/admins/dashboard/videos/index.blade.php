@extends('admins.dashboard.main')

@section('content')

    <div class="panel">

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a href="{{route('videos.create')}}" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="datatable-editable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr class="gradeX">
                        <td>{{ $video->id }}</td>
                        <td><a href="{{route('videos.show', $video->id)}}">{{ $video->title }}</a></td>
                        <td>{{ $video->description }}</td>
                        <td>{{ $video->slug }}</td>
                        <td class="actions">
                            <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                            <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                            <a href="{{route('videos.edit', $video->id)}}" class="btn btn-primary">Edit</a>
                            {{ Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'DELETE']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px;']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- end: page -->

    </div> <!-- end Panel -->

@endsection