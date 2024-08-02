<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wedo - {{$title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('') }}/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/login_asset/css/main.css">
    <!--===============================================================================================-->

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{url('homepage')}}/images/img_bg_4.jpg);">
            <div class="wrap-login100 p-t-50 p-b-30">
                <form class="login100-form validate-form" action="{{ url('') }}/login" method="POST">
                    @csrf
                    <div class="login100-form-avatar mb-0">
                        <img src="{{ url('') }}/favicon.png">
                    </div>

                    <span class="login100-form-title p-b-20">
                        LOGIN<br>WEDDING ORGANIZER
                    </span>

                    <div class="container-login100-form-btn p-t-10 ">
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="wrap-input100 ">
                                <p class="text-light text-center font-weight-bold text-danger">{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif

                    @if (session()->has('success'))
                            @if (is_array(session('success')))
                            @foreach (session('success') as $message)
                                <p class="text-light">{{ $message }}</p>
                            @endforeach
                        @else
                            {{ session('success') }}
                        @endif
                @endif

                    </div>

                  
                    <div class="wrap-input100 validate-input m-b-10" data-validate="NIP harus diisi">
                        <input class="input100" type="text" name="email" placeholder="Email"
                            value="{{ old('email') }}" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10 " data-validate="Password harus diisi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10 ">
                        <button class="login100-form-btn mb-2" value="LOGIN" name="login">
                            MASUK
                        </button>
                        <p class="text-light d-block">Belum punya akun?<a href="{{url('registration')}}" class="text-white mt-3 font-weight-bold"> Daftar Disini</a></p>
                    </div>
                    <div class="container-login100-form-btn p-t-10 ">
                        <p><a href="{{url('')}}" class="text-white mt-3">Kembali ke halaman utama</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="{{ url('') }}/login_asset/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/login_asset/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('') }}/login_asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/login_asset/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/login_asset/js/main.js"></script>
</body>

</html>
