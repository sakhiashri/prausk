<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
         $riwayat_saldo = Transaksi::where("type", 1)
            ->get(); 

        $riwayat_transaksi = Transaksi::where("type", 2)
        ->get(); 

        return view('riwayat', [
            'riwayat_saldo' => $riwayat_saldo,
            'riwayat_transaksi' => $riwayat_transaksi
        ]);
    }
}
