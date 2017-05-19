@extends('admins.dashboard.main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Tags</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr class="success">
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->tagName }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

                $.post('{{ route("get.sub") }}', data, function(data) {
                    /*optional stuff to do after success */
                    console.log(data);
//                    $('#username').html(data.username);
//                    $('#email').html(data.email);
                });
            })
        })
    </script>
@endsection