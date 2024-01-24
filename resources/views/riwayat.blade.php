@extends('layouts.app')
<?php
$page = "riwayat";
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TOP UP</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>status</th>
                            </tr>
                        </thead>
                        @foreach ($riwayat_transaksi as $riwayat_transaksis)
                            <tbody>
                            <tr>
                                <td>
                                    @if ($riwayat_transaksis->status === 3)
                                       <h2>pending</h2>
                                    @endif
                                </td>
                            </tr>
                            
                        </tbody>
                        @endforeach
                        <button type="button" class="btn btn-primary" onclick="window.print()">
                                                        PRINT
                                                      </button>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
