<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'no_telp' => '08557997785',
            'alamat' => 'Jl. Sukamaju jarang mundur',
            'role_id' => 1
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'no_telp' => '08557997735',
            'alamat' => 'Jl. Sukamundur jarang maju',
            'role_id' => 2
        ]);

        Kategori::create([
            'name' => 'paket',
        ]);
        Kategori::create([
            'name' => 'busana',
        ]);
        Kategori::create([
            'name' => 'dokumentasi',
        ]);
        Kategori::create([
            'name' => 'entertainment',
        ]);
        Kategori::create([
            'name' => 'catering',
        ]);
        Kategori::create([
            'name' => 'mc',
        ]);
        Kategori::create([
            'name' => 'pelaminan',
        ]);
    }
}
