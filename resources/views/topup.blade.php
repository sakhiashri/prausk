@extends('layouts.app')
<?php
$page = "topup";
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TOP UP</div>

                <div class="card-body">
                    <h5>Rp. {{ $saldo->saldo }}</h5>

                    <form action="{{ Route('topup.saldo') }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" class="form-control" placeholder="isi disini">
                        <input type="hidden" name="type" value="1">

                        <button class="btn btn-primary mt-4" type="submit">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarik Tunai</div>

                <div class="card-body">
                    <h5>Rp. {{ $saldo->saldo }}</h5>

                    <form action="{{ Route('tunai.saldo') }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" class="form-control" placeholder="isi disini">
                        <input type="hidden" name="type" value="3">

                        <button class="btn btn-primary mt-4" type="submit">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
