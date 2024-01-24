<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajuan = Transaksi::where('type', 1)
            ->where('status', 1)
            ->get();
      
        $pengajuan_tunai = Transaksi::where('type', 3)
        ->where('status', 1)
        ->get();

        $pengajuan_jajan = Transaksi::where("type", 2)
            ->where('status', 3)
            ->get();

       

        

        return view("home", [
            'pengajuan' => $pengajuan,
            'pengajuan_jajan' => $pengajuan_jajan,
            'pengajuan_tunai' => $pengajuan_tunai,
        ]);
    }
}
