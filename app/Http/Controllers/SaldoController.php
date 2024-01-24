<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $saldo = Saldo::where('user_id', Auth::User()->id)->first();


        return view('topup', compact('saldo'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { if ($request->type == 1) {
            $Invoice_id = "SAL." . Auth::User()->id . now()->timestamp;
        }

        Transaksi::create([
            'user_id' => Auth::User()->id,
            'type' => $request->type,
            'status' => 1,
            'order_id' => $Invoice_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('staus', 'Top Up DI proses');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(saldo $saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($transaksi_id)
    {
        $transaksi = Transaksi::find($transaksi_id);
        $saldo = Saldo::where('user_id', $transaksi->User->id)->first();

        Saldo::where('user_id', $transaksi->User->id)->update([
            'saldo' => $saldo->saldo + $transaksi->quantity,
        ]);

        $transaksi->update([
            'status' => 2,
        ]);

        return redirect()->back()->with("status", "Top Up Di Setujui");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($transaksi_id)
    {
         $transaksi = Transaksi::find($transaksi_id);

         $transaksi->delete([
            'status' => 3,
        ]);

        return redirect()->back()->with("status", "Top Up Di Setujui");
    }
}
