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
              

                    <div class="container-xxl flex-grow-1">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal Update Data!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
    
                        @if (session()->has('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                      @if (is_array(session('success')))
                                            @foreach (session('success') as $message)
                                                {{ $message }}
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </button>
                                        @else
                                            {{ session('success') }}
                                        @endif
                                    </div>
                                @endif

                <div class="bg-light p-3 rounded">
                    <span class="login100-form-title p-b-20 text-dark">
                        UPDATE PROFIL
                    </span>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="wrap-input100 ">
                                <p class="text-light text-center font-weight-bold text-danger">{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif

                   <form action="{{url('/userprofile/'.$id_user)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                @foreach ($profile as $data)
                
                <p class="fw-bold">Foto Profil</p>
                <hr>
      
                <div class="form-group">
                      @php
                          if ($data->foto === null) {
                              $path="noimage.jpg";                                        
                          } else {
                              $path="/storage/".$data->foto;                                        
                          }
                      @endphp
                     
                  <img src="{{url($path)}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
                  <input type="hidden" name="foto_lama" class="form-control" value="{{$data->foto}}">
                  @endforeach
                  <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
             </div>
             <br><br>
      
             @php
             $datarole=Auth::user()->role;   
             $hidden_class="";
             if ($datarole==1) {
              $hidden_class="hidden";
             }
            @endphp
             @foreach ($profile as $data)
                <p class="fw-bold">Data Diri</p>
                <hr>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="200" value="{{$data->nama}}">
                </div>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="200" value="{{$data->tempat_lahir}}">
                </div>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$data->tanggal_lahir}}">
                </div>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">E-mail</label>
                  <input type="email" name="email" class="form-control bg-secondary text-light" placeholder="E-mail" maxlength="200" value="{{$data->email}}" readonly>
                </div>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">No HP</label>
                  <input type="number" name="no_hp" class="form-control" placeholder="No HP" maxlength="15" value="{{$data->no_hp}}">
                </div>
                <div class="form-group mb-2">
                  <label class="font-weight-bold">Alamat</label>
                  <textarea name="alamat" class="form-control" cols="30" rows="10">{{$data->alamat}}</textarea>
                </div>
                <br>  
               
                <div class="form-group mb-2">
                  <label class="font-weight-bold">Password</label>
                  <input type="hidden" name="password_lama" class="form-control" placeholder="Password" value="{{$data->password}}" maxlength="200">
                  <input type="password" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Mengubah Password" maxlength="200">
              </div>
                @endforeach
                <div hidden class="form-group mb-2" {{$hidden_class}}>
                    <label class="font-weight-bold">Role</label>
                    <select name="role" class="form-control">
                      @foreach ($profile as $item)
                      @php
                          $roles = $data->role;
                          $tampil_role = "";
                          if ($roles==0) {
                            $tampil_role = "Super Admin";
                          }elseif ($roles==1) {
                            $tampil_role = "Admin";
                          }else {
                            $tampil_role = "User";
                          }
                      @endphp
                      <option selected hidden value="{{$data->role}}">{{$tampil_role}}</option>
                      @endforeach
                      <option value="0">Super Admin</option>
                      <option value="1">Admin</option>
                      <option value="2">User</option>
                    </select>
                </div>
            <div class="form-group mt-5">
              <button type="submit" class="btn btn-primary form-control">Simpan</button>
              <p class="text-center"><a href="{{url('')}}" class="text-dark mt-3">Kembali ke halaman utama</a></p>
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

    <script>
        function showPreview(event){
           if(event.target.files.length > 0){
               var src = URL.createObjectURL(event.target.files[0]);
               var preview = document.getElementById("photopreview");
               preview.src = src;
               preview.style.display = "block";
           }
           }
    </script>
</body>

</html>
