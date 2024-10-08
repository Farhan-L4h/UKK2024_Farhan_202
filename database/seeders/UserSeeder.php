<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'username' => "AdminS",
            'email' => "admin@gmail.com",
            'password' => Hash::make("123456789"),
            'role' => "admin",
            'alamat' => "toko"
        ]);

        DB::table('users')->insert([
            'name' => "karyawan",
            'username' => "karyawanses",
            'email' => "petugas@gmail.com",
            'password' => Hash::make("123456789"),
            'role' => "petugas",
            'alamat' => "toko"
        ]);

        DB::table('users')->insert([
            'name' => "pelanggan",
            'username' => "pelangganss",
            'email' => "pelanggan@gmail.com",
            'password' => Hash::make("123456789"),
            'role' => "pelanggan",
            'alamat' => "toko"
        ]);
    }
}
