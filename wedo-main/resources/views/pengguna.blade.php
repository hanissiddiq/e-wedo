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
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            @php
            $datarole=Auth::user()->role;   
            $hidden_class="";
            $hidden_style="";
            if ($datarole==1) {
             $hidden_class="hidden";
             $hidden_style="d-none";
            }
           @endphp
            
            <div class="content">
                <p align="left">
                    <button type="button" class="btn btn-success font-weight-bold  {{$hidden_style}}" data-toggle="modal" data-target="#exampleModal"
                        id="btntambah">
                        <i class="fa fa-plus"></i> TAMBAH DATA
                    </button>
                </p>

                <table class="table table-hover table-sm table-striped table-bordered table-responsive-sm" id="example3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">NO</th>
                            <th scope="col" class="text-center">NAMA</th>
                            <th scope="col" class="text-center">NO HP</th>
                            <th scope="col" class="text-center">EMAIL</th>
                            <th scope="col" class="text-center">ROLE</th>
                            <th scope="col" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $data)
                            <tr class="nomor text-center">
                                <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                <td class="align-middle">{{ $data->nama }}</td>
                                <td class="align-middle">{{ $data->no_hp }}</td>
                                <td class="align-middle">{{ $data->email }}</td>
                                @php
                                $datarole=$data->role;   
                                $name="";
                                $class="";
        
                                if ($datarole==0) {
                                   $name="Superadmin";
                                   $class="btn-danger";
                                }elseif ($datarole==1) {
                                   $name="Admin";
                                   $class="btn-success";
                                }else{
                                   $name="User";
                                   $class="btn-info";
                                }
                               @endphp
                                <td class="align-middle"><div class="btn {{$class}} rounded-pill font-weight-bold">{{ $name }}</div></td>
                                <td class="text-center align-middle"><a class="btn btn-warning btn-sm mb-1 w-100 font-weight-bold " href="{{url('pengguna/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100 font-weight-bold {{$hidden_style}}" href="{{url('pengguna/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel font-weight-bold">Tambah Pengguna</h5>
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
