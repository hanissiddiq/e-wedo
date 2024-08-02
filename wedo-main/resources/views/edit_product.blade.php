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
                     
                        <form action="{{url('/product/'.$id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            
                            <label>Foto Paket Laundry</label>
                            <hr>
                  
                            <div class="form-group">
                              @foreach ($product as $data)
                                  @php
                                      if ($data->foto === null) {
                                          $path="noimage.jpg";                                        
                                      } else {
                                          $path="/storage/".$data->foto;                                        
                                      }
                                  @endphp
                                
                              <img src="{{url($path)}}" class="rounded mx-auto d-block mb-2 border" id="photopreview" style="width:300px;height:200px;">
                              <input type="hidden" name="foto_lama" class="form-control" value="{{$data->foto}}">
                              @endforeach
                              <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
                            </div>
                            <br>
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Nama Laundry</label>
                              <select name="id_toko" class="form-control select2"
                              data-allow-clear="true">
                                  @foreach ($product as $data)
                                  <option hidden selected value="{{$data->id_toko}}">{{$data->nama}}</option>
                                  @endforeach
                                  @foreach ($store as $data)
                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                  @endforeach
                              </select>
                  
                              @foreach ($product as $data)
                            <div class="form-group mt-2">
                                <label class="font-weight-bold">Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" maxlength="200" value="{{$data->nama_paket}}">
                            </div>
                  
                            <div class="form-group mt-2">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi">{{$data->deskripsi}}</textarea>
                            </div>

                            <div class="form-group mt-2">
                              <label class="font-weight-bold">Harga/Kg</label>
                              <input type="number" name="harga" class="form-control" placeholder="Harga/Kg" maxlength="200" value="{{$data->harga}}">
                          </div>
                            <div class="form-group mt-2">
                              <button type="submit" class="btn btn-primary form-control">Update Produk</button>
                            </div>
                            @endforeach
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
