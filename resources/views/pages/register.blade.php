<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-md-5">
            <h2>Register</h2>
            @if(count($errors))
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('user.register') }}" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">REGISTER</button>
                </div>
            </form>
        </div>
        <div class="col-md-offset-2 col-md-4">
            @if(Request::session()->has('loginError'))
                <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ Request::session()->get('loginError') }}
                </div>
            @endif
            <h2>Login</h2>
            <form action="{{ route('user.login') }}" method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="login_email" class="form-control" placeholder="Email" value="{{ old('login_email') }}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="login_password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">LOGIN</button>
                </div>
            </form>
        </div>
        <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>