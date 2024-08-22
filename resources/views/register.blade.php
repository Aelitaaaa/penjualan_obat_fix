<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Display Error Messages -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
            @endif

            @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center" style="color: grey;">
                    <h1 class="h4 mb-4">Create an Account!</h1>
                    <h2 class="h4 mb-2">Aplikasi Penjualan Obat</h2>
                  </div>
                  <br>

                  <!-- Form -->
                  <form class="user" action="{{ route('register') }}" method="POST">
                    @csrf <!-- CSRF Token -->
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user" id="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Register!">
                    <br>
                    <hr>
                  </form>

                  <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
