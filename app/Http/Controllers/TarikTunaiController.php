<?php

namespace App\Http\Controllers;

use App\Models\saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarikTunaiController extends Controller
{
     
    public function index()
    {
        //
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
    { if ($request->type == 3) {
            $order_id = "TNAI." . Auth::User()->id . now()->timestamp;
        }

        Transaksi::create([
            'user_id' => Auth::User()->id,
            'type' => $request->type,
            'status' => 1,
            'order_id' => $order_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('staus', 'Top Up DI proses');
       
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($tunai_id)
    {
          {
        $tunai = Transaksi::find($tunai_id);
        $saldo = saldo::where('user_id', $tunai->User->id)->first();

        Saldo::where('user_id', $tunai->User->id)->update([
            'saldo' => $saldo->saldo - $tunai->quantity,
        ]);

        $tunai->update([
            'status' => 2,
        ]);

        return redirect()->back()->with("status", "Tarik Tunai Disetujui");

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tunai_id)
    {
         {
         $tunai = Transaksi::find($tunai_id);

         $tunai->delete([
            'status' => 3,
        ]);

        return redirect()->back()->with("status", "Tarik Tunai Ditolak");
    }
    }
}
