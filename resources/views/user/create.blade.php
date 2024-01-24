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
            <h3 class="fw-bold"> TAMBAH USER</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
        @csrf
        <div class="col">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">Pasword</label>
            <input type="text" class="form-control" name="pasword">
        </div>
        <div class="col mt-2">
            <label for="" class="form-label">Role</label>
            <select class="form-select" name="role">
                <option value="1">Admin</option>
                <option value="2">Bank</option>
                <option value="3">Kantin</option>
                <option value="4">User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
        </div>
    </div>
   </div>
   </div>
</div>
@endsection
