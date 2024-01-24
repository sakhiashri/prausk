@extends('layouts.app')
<?php
$page = "produk";
?>
@section('content')
<div class="container">
    <div class="row">
       @foreach ($produk as $produks)
        <div class="col-md-3">
            <div class="card">
                <img src="/banner.jpg" alt="">

                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-bold">Nama : {{ $produks->name }}</h5>
                    </div>
                    <div class="card-text">
                        <h4 class="text-warning fw-bold">Rp. {{ $produks->price }}</h4>
                    </div>

                    <form action="{{ Route('addTocart', $produks->id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" class="form-control" value="1" min="1" required>
                        <input type="hidden" name="produk_id" value="{{ $produks->id }}">

                        <button class="btn btn-danger mt-3" type="submit">Cart</button>
                       
                    </form>
                </div>
            </div>
        </div>
       @endforeach

 <div class="row mt-4">
        
       
        <div class="col-md-6">
            <div class="card">
               <div class="card-header">#Cart</div>

               
                    <div class="card-body">
                   <table class="table mt-4 table-warning">
                    <thead>
                         <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                     </tr>
                    </thead>
                    @php
                        $no = 1
                    @endphp
                     @foreach ($cart as $carts)
                    <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $carts->produk->name }}</td>
                            <td>{{ $carts->produk->price }}</td>
                            <td>{{ $carts->quantity }}</td>
                            <td>{{ $carts->produk->price * $carts->quantity }}</td>
                        </tr>
                    </tbody>
                      @endforeach
                     
                   </table>

                   <h4 class="fw-bold">Total Harga : Rp. {{ $total_cart }}</h4>
                   
                </div>
              

                <a href="{{ Route("checkout") }}" class="btn btn-primary">CheckOut</a>
            </div>
        </div>


         <div class="col-md-6">
            <div class="card">
               <div class="card-header">#Cart</div>

               
                    <div class="card-body">
                   <table class="table mt-4 table-warning">
                    <thead>
                         <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                     </tr>
                    </thead>
                    @php
                        $no = 1
                    @endphp
                     @foreach ($checkout as $checkouts)
                    <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $checkouts->produk->name }}</td>
                            <td>{{ $checkouts->produk->price }}</td>
                            <td>{{ $checkouts->quantity }}</td>
                            <td>{{ $checkouts->produk->price * $checkouts->quantity }}</td>
                        </tr>
                    </tbody>
                      @endforeach
                     
                   </table>

                   <h4 class="fw-bold">Total Harga : Rp. {{ $total_checkout }}</h4>
                   
                </div>
              

                <a href="{{ Route("bayar") }}" class="btn btn-primary">BAYAR</a>
            </div>
        </div>
      
     
         </div>
    </div>
</div>
@endsection
