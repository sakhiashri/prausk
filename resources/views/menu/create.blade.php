@extends('layouts.app')
<?php
$page = "menu";
?>
@section('content')
<div class="container">
   <div class="row justify-content-center">
    <div class="col-md-6">
     <div class="card">
        <div class="card-header">
            <h3 class="fw-bold"> TAMBAH PRODUK</h3>
        </div>
        <div class="card-body">
            <form action="{{ Route("menu.store") }}" method="POST">
        @csrf
        <div class="col">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">Stok</label>
            <input type="text" class="form-control" name="stok">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="desc">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
        </div>
    </div>
   </div>
   </div>
</div>
@endsection
