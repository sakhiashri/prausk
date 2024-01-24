<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Role;
use App\Models\saldo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => "admin"]);
        Role::create(['name' => "bank"]);
        Role::create(['name' => "kantin"]);
        Role::create(['name' => "siswa"]);


        User::create([
        'name' => "admin",
        'role_id' => "1",
        'username' => "admin",
        'password' => Hash::make('admin')
        ]);


        User::create([
        'name' => "bank",
        'role_id' => "2",
        'username' => "bank",
        'password' => Hash::make('bank')
        ]);

        User::create([
        'name' => "kantin",
        'role_id' => "3",
        'username' => "kantin",
        'password' => Hash::make('kantin')
        ]);


        User::create([
        'name' => "siswa",
        'role_id' => "4",
        'username' => "siswa",
        'password' => Hash::make('siswa')
        ]);

        saldo::create([
            'user_id' => 4,
            'saldo' => 10000,
        ]);

        Produk::create([
            'name' => 'bakso',
            'price' => '2000',
            'stok' => '20',
            'desc' => 'enak banget dah dah dah ini juara 1 pokonya'
        ]);

        Produk::create([
            'name' => 'bakso',
            'price' => '2000',
            'stok' => '20',
            'desc' => 'enak banget dah dah dah ini juara 1 pokonya'
        ]);

        Produk::create([
            'name' => 'bakso',
            'price' => '2000',
            'stok' => '20',
            'desc' => 'enak banget dah dah dah ini juara 1 pokonya'
        ]);
         Produk::create([
            'name' => 'bakso',
            'price' => '2000',
            'stok' => '20',
            'desc' => 'enak banget dah dah dah ini juara 1 pokonya'
        ]);
        
    }
}
