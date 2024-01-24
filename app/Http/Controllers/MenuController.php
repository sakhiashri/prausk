<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class MenuController extends Controller
{
        public function index()
    {
        $produk = Produk::all();
        return view('menu', compact("produk"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produk::create([
            "name" => $request->name,
            "price" => $request->price,
            "stok" => $request->stok,
            "desc" => $request->desc,
        ]);

        return redirect("menu");
    }

    /**
     * Display the specified resource.
     */
    public function show( )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view("menu.edit", compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $produk = Produk::find($id);
         $produk->update($request->all());

        return redirect("menu")->with("status", "Berhasil update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $produk = Produk::find($id);

         
        $produk->delete();

        return redirect("menu")->with("status", "Berhasil update");


    }
}
