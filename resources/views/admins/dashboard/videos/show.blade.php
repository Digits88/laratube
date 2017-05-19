@extends('admins.dashboard.main')

@section('content')

    <div align="center" class="embed-responsive embed-responsive-16by9">
        <video autoplay loop class="embed-responsive-item">
            <source src="{{$video}}" type="video/mp4">
        </video>
    </div>

@endsection