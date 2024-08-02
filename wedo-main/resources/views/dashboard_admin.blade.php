@extends('template/frame')
@section('content')
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-uppercase font-weight-bold">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('')}}" class="text-decoration-none">Wedo</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
    <!-- /.content-header -->
    <div class="content">
        <div class="card">
            <div class="card-header bg-info">
                <h3><b>Halo, {{Auth::user()->nama}}!</b></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{$baru}}</h3>
                    <p>Orderan Masuk</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-table"></i>
                    </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{$proses}}</h3>
                    <p>Orderan Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{$selesai}}</h3>
                    <p>Orderan Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>{{$jmluser}}</h3>
                    <p>Total User</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    </div>
                    </div>
                    
                    </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
        </div><!-- /.container-fluid -->
    </div>
    
@endsection
