<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wedo - Registration</title>
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
                <form class="login100-form validate-form" action="{{ url('') }}/registration" method="POST">
                    @csrf

                    <span class="login100-form-title p-b-20">
                        REGISTRASI AKUN<br>WEDDING ORGANIZER
                    </span>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="wrap-input100 ">
                                <p class="text-light text-center font-weight-bold text-danger">{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif

                    
                        <input class="input100 p-4 mb-3" type="text" name="nama" placeholder="Nama" value="{{old('nama')}}">
                        <input class="input100 p-4 mb-3" type="text" name="email" placeholder="Email" value="{{old('email')}}">
                        <input class="input100 p-4 mb-3" type="text" name="no_hp" placeholder="No HP" value="{{old('no_hp')}}">
                        <input class="input100 p-4 mb-3" type="password" name="password" placeholder="Password">
                        <input class="input100 p-4" type="hidden" name="role" placeholder="Role" value="2">

                    <div class="container-login100-form-btn p-t-10 ">
                        <button class="login100-form-btn mb-2" value="LOGIN" name="login">
                            DAFTAR
                        </button>
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
