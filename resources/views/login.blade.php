<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/assets_auth/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/assets_auth/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets_auth/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('assets/assets_auth/css/style.css')}}">

    <title>Aplikasi Kasir</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url({{asset('assets/assets_auth/images/ppp.jpg')}});"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Aplikasi  Kasir</strong></h3>
            <p class="mb-4">Selamat Datang di Aplikasi Kasir</p>

            @if (Session::get('success'))
            <div class="alert alert-success w-75" style="text-align: center">
              {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::get('fail'))
              <div class="alert alert-danger" style="text-align: center">
                {{ Session::get('fail') }}
              </div>
            @endif
            @if (Session::get('notAllowed'))
              <div class="alert alert-danger" style="text-align: center">
                {{ Session::get('notAllowed') }}
              </div>
            @endif
            @if (Session::get('berhasil'))
            <div class="alert alert-success" style="text-align: center">
              {{ Session::get('berhasil') }}
            </div>
          @endif

            <form action="{{ route('login.auth'	) }}" method="POST">
              @csrf
              <div class="form-group first">
                <label for="username">Enter email</label>
                <input type="text" class="form-control" placeholder="Please enter your email!" name="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Enter password</label>
                <input type="password" class="form-control" placeholder="Please enter your password!" name="password">
              </div>

              <button type="submit" class="btn btn-block btn-primary" style="margin-top: 50px; background-color:#4154f1; border: none;" >Log In</button>

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>