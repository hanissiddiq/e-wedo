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
                @php
                $datarole=Auth::user()->role;   
                $hidden_class="";
                if ($datarole==1) {
                 $hidden_class="hidden";
                }
               @endphp
                <p align="left" {{$hidden_class}}>  
                    <a href="{{url('store/add')}}" class="btn btn-sm btn-primary font-weight-bold"><span><i class="fa fa-plus"></i> <span class="d-none d-sm-inline-block"> Tambah Toko Baru</span></span></a>
                </p>
                <table class="table table-hover table-sm table-striped table-bordered table-responsive-sm" id="example3">
                    <thead class="thead-dark">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Status Pengajuan</th>
                        <th class="text-center">Admin</th>
                        <th class="text-center" {{$hidden_class}}>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($store as $data)
                      @php
                          $status_pengajuan=$data->status_pengajuan;
                          $tampil_status="";
                          $class_status="";
                          if ($status_pengajuan==0) {
                              $tampil_status="Close";
                              $class_status="btn-danger";
                          }elseif ($status_pengajuan==1) {
                              $tampil_status="Antrian";
                              $class_status="btn-warning";
                          }else{
                              $tampil_status="Approved";
                              $class_status="btn-success";
                          }
                      @endphp
                      <tr>
                          <td class="text-center align-middle">{{$loop->iteration}}</td>
                          <td class="text-center align-middle">{{$data->nama}}</td>
                          <td class="text-center align-middle">{{$data->alamat}}</td>
                          <td class="text-center align-middle"><div class= "btn {{$class_status}} w-100 rounded-pill">{{$tampil_status}}</div></td>
                          <td class="text-center align-middle"><a class="btn btn-info w-100 rounded-pill " href="{{url('pengguna/detail/'.$data->id_user)}}">{{$data->email_admin}}</a></td>
                          <td class="text-center" {{$hidden_class}}><a class="btn btn-warning btn-sm mb-1 w-100 font-weight-bold" href="{{url('store/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100 font-weight-bold" href="{{url('store/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
        
            </div>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel font-weight-bold">Tambah Pengguna {{ $subtitle }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/pengguna')}}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="200" value="{{old('nama')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-bold">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="200" value="{{old('email')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-bold">No HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="No HP" maxlength="15" value="{{old('no_hp')}}" minlength="10">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" maxlength="200">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-bold">Role</label>
                            <select name="role" class="form-control">
                                <option hidden selected value="">-- Role --</option>
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
