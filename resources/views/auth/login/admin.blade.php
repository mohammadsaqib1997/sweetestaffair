<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  {{-- Main Global CSS --}}
  <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pages/admin/sb-admin.css') }}">
</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login Form</h1>
                  </div>
                  <form class="user" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    @if ($errors->has('username') || $errors->has('password'))
                    <p class="text-center text-danger">
                      {{ $errors->has('username') ? $errors->first('username') : $errors->first('password') }}
                    </p>
                    @endif
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user"
                        placeholder="Enter Username..." autofocus required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user"
                        placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</body>

</html>