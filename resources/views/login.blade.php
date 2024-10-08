<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

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

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
          <!-- Pesan sukses -->
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}
            </div>
            @endif
            
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome! Please Login</h1>
                  </div>
                  @include('pembelian.create') 
                  <br>
                  <form class="user" action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">  
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login!">
                  </form>
                  <br>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                  <a class="small" href="{{ route('register') }}">Buat Akun</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script>
              Swal.fire(
    title: 'Berhasil Login!',
    icon: 'success',
    confirmButtonText: 'OK',
    buttonsStyling: false, 
    customClass: {
        confirmButton: 'btn-custom-confirm'
});
    </script>
  @include('template.script')
  @include('sweetalert::alert')

</body>

</html>