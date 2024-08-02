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
                     
                        <form action="{{url('/purchase')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Nama Pelanggan</label>
                              <select name="id_user" class="form-control js-example-basic-single"
                              data-allow-clear="true">
                                  <option hidden value="">-- Nama Pelanggan --</option>
                                  @foreach ($user as $data)
                                  <option value="{{$data->id}}">{{$data->nama}} ({{$data->email}})</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group mb-2">
                            <label class="font-weight-bold">Nama WO</label>
                            <select name="id_toko" class="form-control js-example-basic-single"
                            data-allow-clear="true">
                            <option hidden value="">-- Nama WO --</option>
                                @foreach ($store as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                          <label class="font-weight-bold">Nama Produk</label>
                          <select name="id_paket" class="form-control js-example-basic-single"
                          data-allow-clear="true">
                          <option hidden value="">-- Nama Produk --</option>
                              @foreach ($product as $data)
                              <option value="{{$data->id}}">{{$data->nama_paket}} ({{$data->nama_wo}})</option>
                              @endforeach
                          </select>
                      </div>
                            <div class="form-group mb-2">
                              <label class="font-weight-bold">Payment</label>
                              <select name="payment" class="form-control select2"
                              data-allow-clear="true">
                                  <option value="Cash">Cash</option>
                              </select>
                          </div>
                          <div class="form-group mb-2">
                            <label class="font-weight-bold">Status</label>
                            <select name="status" class="form-control select2"
                            data-allow-clear="true">
                                <option value="Antrian">Antrian</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary form-control">Tambah Transaksi Baru</button>
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
