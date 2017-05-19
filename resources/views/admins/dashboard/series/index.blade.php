@extends('admins.dashboard.main')

@section('content')

    <div class="panel">

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped" id="datatable-editable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Browser</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $s)
                    <tr class="gradeX">
                        <td>{{ $s->id }}</td>
                        <td><a href="{{route('series.show', $s->id)}}">{{ $s->name }}</a></td>
                        <td class="actions">
                            <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                            <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                            <a href="{{route('series.edit', $s->id)}}" class="btn btn-primary">Edit</a>
                            {{ Form::open(['route' => ['series.destroy', $s->id], 'method' => 'DELETE']) }}
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