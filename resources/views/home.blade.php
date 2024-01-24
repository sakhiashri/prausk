@extends('layouts.app')
<?php
$page = "home";
?>
@section('content')
<div class="container">

    @if (Auth::User()->role_id === 1)
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ Route("user.create") }}" class="btn btn-primary">Tambah</a></div>

                <div class="card-body">
                     <table class="table mt-4 table-warning">
                    <thead>
                         <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>username</th>
                        <th>Role</th>
                        <th>aksi</th>
                     </tr>
                    </thead>
                    @php
                        $no = 1
                    @endphp
                     @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td> <a href="" class="btn btn-success">DETAIL</a>
                                <a href="" class="btn btn-warning">EDIT</a></td>

                        </tr>

                       
                    </tbody>
                      @endforeach
                     
                   </table>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if (Auth::User()->role_id === 4)
        <div class="banner ">
            <div class="text"></div>
        </div>
    @endif



   @if (Auth::User()->role_id === 2)
        <div class="row text-center">
        @foreach ($pengajuan as $pengajuans)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-warning">{{ $pengajuans->User->name }}</div>

                <div class="card-body">
                   <div class="card-title">
                    <h6>{{ $pengajuans->order_id }}</h6>
                   </div>
                   <div class="card-text">
                    <h5>Isi saldo: {{ $pengajuans->quantity }}</h5>
                   </div>
                </div>

                <div class="card-footer  bg-warning">
                    <a href="{{ Route('topup.setuju', $pengajuans->id) }}" class="btn btn-success">SETUJU</a>
                    <a href="{{ Route('topup.tolak', $pengajuans->id) }}" class="btn btn-danger">TOLAK</a>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>
   


    <div class="row text-center mt-5">
        @foreach ($pengajuan_tunai as $pengajuans_tunai)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary">{{ $pengajuans_tunai->User->name }}</div>

                <div class="card-body">
                   <div class="card-title">
                    <h6>{{ $pengajuans_tunai->order_id }}</h6>
                   </div>
                   <div class="card-text">
                    <h5>Tarik Tunai: {{ $pengajuans_tunai->quantity }}</h5>
                   </div>
                </div>

                <div class="card-footer  bg-primary">
                    <a href="{{ Route('tunai.setuju', $pengajuans_tunai->id) }}" class="btn btn-success">SETUJU</a>
                    <a href="{{ Route('tunai.tolak', $pengajuans_tunai->id) }}" class="btn btn-danger">TOLAK</a>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>

    @endif




   @if (Auth::User()->role_id === 3)
     <div class="row text-center">
        @foreach ($pengajuan_jajan as $pengajuans_jajans)
        <div class="col-md-3 mt-5">
            <div class="card">
                <div class="card-header bg-warning">{{ $pengajuans_jajans->User->name }}</div>

                <div class="card-body">
                   <div class="card-title">

                {{-- mengecek apakah produk masih ada --}}

                   @if($pengajuans_jajans->produk)
                            <h5>{{ $pengajuans_jajans->produk->name }}</h5>
                            <h5>{{ $pengajuans_jajans->produk->Price }}</h5>
                        @else
                            <p class="fw-bold">Produk tidak ditemukan</p>
                        @endif
                    
                   </div>
                   <div class="card-text">
                    <h5>JUMLAH : {{ $pengajuans_jajans->quantity }}</h5>
                   </div>
                </div>

                <div class="card-footer  bg-warning">
                    <a href="{{ Route('bayar.setuju', $pengajuans_jajans->id) }}" class="btn btn-success">SETUJU</a>
                    <a href="{{ Route('bayar.tolak', $pengajuans_jajans->id) }}" class="btn btn-danger">TOLAK</a>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>
   @endif
</div>
@endsection
