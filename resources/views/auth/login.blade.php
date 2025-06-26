<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
