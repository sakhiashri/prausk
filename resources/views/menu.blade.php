@extends('layouts.app')
<?php
$page = "menu";
?>
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <a href="{{ Route('menu.create') }}" class="btn btn-primary">TAMBAH +</a>
        </div>
        <div class="card-body"><div class="row text-center">
       @foreach ($produk as $produks)
        <div class="col-md-3 mt-5 rounded-xl">
            <div class="card">
                <img src="/banner.jpg" alt="">
                

                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-bold">Nama : {{ $produks->name }}</h5>
                    </div>
                    <div class="card-text">
                        <h4 class="text-warning fw-bold">Rp. {{ $produks->price }}</h4>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="" class="btn btn-success">DETAIL</a>
                    <a href="{{ Route("menu.edit", $produks->id) }}" class="btn btn-warning">EDIT</a>
                    <form id="deleteForm" action="{{ route('menu.delete', ['id' => $produks->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <!-- You may not need any other form content, depending on your use case -->
    <button type="submit" class="btn btn-danger mt-2">Hapus</button>
</form>



                </div>
            </div>
        </div>
       @endforeach
    </div></div>
    </div>
</div>
@endsection
