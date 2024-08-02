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
                     
                        <form action="{{url('/product')}}" method="POST" enctype="multipart/form-data">
                            @csrf          
                            <div class="form-group">
                              <img src="{{url('noimage.jpg')}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
                              <label class="font-weight-bold">Foto Paket</label>
                              <input type="file" name="foto" class="form-control mx-auto d-block mb-2" onchange="showPreview(event);">
                            </div>
                  
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Nama WO</label>
                              <select name="id_toko" class="form-control js-example-basic-single"
                              data-allow-clear="true">
                                  <option hidden selected value="">-- Nama WO --</option>
                                  @foreach ($store as $data)
                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                  @endforeach
                              </select>
                  
                            <div class="form-group mt-2">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" name="nama_paket" class="form-control" placeholder="Nama Produk" maxlength="200" value="{{old('nama_paket')}}">
                            </div>

                            <div class="form-group mt-2">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi">{{old('deskripsi')}}</textarea>
                            </div>
                  
                            <div class="form-group mt-2">
                              <label class="font-weight-bold">Harga</label>
                              <input type="number" name="harga" class="form-control" placeholder="Harga" maxlength="200" value="{{old('harga')}}">
                          </div>
                            <div class="form-group mt-2">
                              <button type="submit" class="btn btn-primary form-control">Tambah Produk</button>
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
