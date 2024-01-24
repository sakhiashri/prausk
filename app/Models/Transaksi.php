<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ([
        'user_id',
        'produk_id',
        'order_id',
        'type',
        'status',
        'quantity',
    ]);

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Produk(){
        return $this->belongsTo(Produk::class);
    }
}
