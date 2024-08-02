@extends('template/frame')
@section('content')
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal Menambahkan Data!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    @if (is_array(session('success')))
                        @foreach (session('success') as $message)
                            {{ $message }}
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    @else
                        {{ session('success') }}
                    @endif
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-uppercase font-weight-bold">{{ $subtitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Wedo</a></li>
                        <li class="breadcrumb-item active">{{ $subtitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>


            <div class="content">
                <div class="card">
                    <div class="card-header bg-primary">
                      Isi data dengan lengkap dan benar
                    </div>
                    <div class="card-body">
                     
                        <form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <img src="{{url('noimage.jpg')}}" class="rounded-circle mx-auto d-block mb-2 border img-fluid" id="photopreview" style="width:200px;height:200px;">
                              <label class="font-weight-bold">Foto WO</label>
                              <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
                            </div>
                            <br>
                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Nama WO</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama WO" maxlength="200" value="{{old('nama')}}">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Desa</label>
                                <input type="text" name="desa" class="form-control" placeholder="Desa" maxlength="200" value="{{old('desa')}}">
                            </div>
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Kecamatan</label>
                              <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" maxlength="200" value="{{old('kecamatan')}}">
                          </div>
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Kabupaten</label>
                              <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" maxlength="200" value="{{old('kabupaten')}}">
                          </div>
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Provinsi</label>
                              <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" maxlength="200" value="{{old('provinsi')}}">
                          </div>
                          <div class="form-group mb-2">
                            <label class="font-weight-bold">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="10">{{old('alamat')}}</textarea>
                          </div>
                          <div class="form-group mb-2">
                            <label class="font-weight-bold">Admin</label>
                            <select name="id_user" class="form-control js-example-basic-single" >
                                <option hidden selected value="">--  Admin --</option>
                                @foreach ($user as $data)
                                <option value="{{$data->id}}">{{$data->email}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group mb-2">
                            <label class="font-weight-bold">Status WO</label>
                            <select name="status_pengajuan" class="form-control ">
                                <option hidden selected value="">-- Status WO --</option>
                                <option value="0">Close</option>
                                <option value="1">Antrian</option>
                                <option value="2">Approved</option>
                            </select>
                        </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Hidden Status</label>
                                <select name="hidden" class="form-control">
                                    <option hidden selected value="">-- Hidden Status --</option>
                                    <option value="0">Hidden</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary form-control">Simpan Data</button>
                        </div>
                    </form>

                    </div>
                  </div>
               
        
            </div>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <script>
        function showPreview(event){
           if(event.target.files.length > 0){
               var src = URL.createObjectURL(event.target.files[0]);
               var preview = document.getElementById("photopreview");
               preview.src = src;
               preview.style.display = "block";
           }
           }


        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                width : '100%'
            });
        });
    </script>
    

@endsection
