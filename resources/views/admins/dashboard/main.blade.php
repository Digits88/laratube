<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admins.dashboard.partials._head')
        <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        </script>
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            @include('admins.dashboard.partials._nav')
            @include('admins.dashboard.partials._left')
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @include('partials._messages')

                        @yield('content')
                    </div>
                </div>
            </div>
            {{--<div class="container">--}}

                 {{--{{ Auth::check() ? "Logged in" : "Logged out" }} --}}

            @include('partials._footer')
            {{--</div>--}}
        </div>
        @include('admins.dashboard.partials._javascripts')
        @yield('scripts')
    </body>
</html>
