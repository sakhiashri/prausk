<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        $cart = Transaksi::where('user_id', Auth::User()->id)->where('type', 2)->where('status', 1)->get();
        $checkout =  Transaksi::where('user_id', Auth::User()->id)->where('type', 2)->where('status', 2)->get();

        $total_cart = 0;

        foreach ($cart as $carts) {
            $total_cart += $carts->produk->price * $carts->quantity;
        }

       


        $total_checkout = 0;

        foreach ($checkout as $checkouts) {
            $total_checkout += $checkouts->produk->price * $checkouts->quantity;
        }

  
        
        
        return view("produk", [
            'produk' => $produk,
            'cart' => $cart,
            'total_cart' => $total_cart,
            'total_checkout' =>   $total_checkout,
            'checkout' => $checkout,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      

        Transaksi::create([
            'user_id' => Auth::User()->id,
            'produk_id' => $request->produk_id,
            'type' =>  2,
            'status' => 1,
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with("status", "Behasil Masukan Keranjang");
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
          $data =  Transaksi::where('user_id', Auth::User()->id)->where('type', 2)->where('status', 2)->get();

                $total_data = 0;

            foreach ($data as $datas) {
                $total_data += $datas->produk->price * $datas->quantity;
            };

       

          $saldo =  saldo::where('user_id', Auth::User()->id)->first();

          $saldo->update([
            'saldo' => $saldo->saldo - $total_data,
          ]);


           foreach ($data as $datas) {
                 if ($datas->produk->stok >= $datas->quantity) {
            $datas->produk->update([
                'stok' => $datas->produk->stok - $datas->quantity
            ]);
          } else {
            # code...
          }
          
            };


            

         

           foreach ($data as $datas) {
            $datas->update([
                'status' => 3,
            ]);
            };



        return redirect()->back()->with("status", "Transaksi Berhasl Tunggu Proses");
          
    }

    /**
     * Show the form for editing the specified resource.


     * Update the specified resource in storage.
     */
    public function update()
    {
          $Order_id = "INV." . Auth::User()->id . now()->timestamp;

        $transaksi = Transaksi::where('user_id', Auth::User()->id)->where('type', 2)->where('status', 1);

        $transaksi->update([
            'order_id' => $Order_id,
            'status' => 2,

        ]);

        return redirect()->back()->with("status", "Berhasi Menambah Produk");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function setuju($id){
     $transaksi = Transaksi::find($id);
        

        $transaksi->update([
            'status' => 4,
        ]);

        return redirect()->back()->with("status", "Jajan Disetujui");
        
    }

    public function tolak($id){

    $transaksi = Transaksi::find($id);
    $total_data = 0;

     
    
       if ($transaksi->data && $transaksi->data->isNotEmpty()) {
        foreach ($transaksi->data as $data) {
            // Periksa apakah $data->produk ada sebelum mengakses properti produk
            if ($data->produk) {
                $total_data += $data->produk->price * $data->quantity;
            }
        }
    }
    


    $saldo = Saldo::where('user_id', $transaksi->user_id)->first();

        $saldo->update([
            'saldo' => $saldo->saldo + $total_data,
        ]);
        

        $transaksi->update([
            'status' => 5,
        ]);

        return redirect()->back()->with("status", "jajan ditolak");


        
        
    }
}
