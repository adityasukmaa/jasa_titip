<?php

namespace Database\Seeders;

use App\Models\Kurir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KurirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kurir::create([
            'full_name'     => 'Kurir A1',
            'address_ktp'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'address_now'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'profile_img'   => 'profile_kurir_example.jpg',
            'ktp_img'       => 'ktp_kurir_example.jpg',
            'wa_number'     => '6282284393018',
            'password'      => '123123',
            'cabang_id'     => 1,
        ]);
        Kurir::create([
            'full_name'     => 'Kurir A2',
            'address_ktp'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'address_now'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'profile_img'   => 'profile_kurir_example.jpg',
            'ktp_img'       => 'ktp_kurir_example.jpg',
            'wa_number'     => '6292210002001',
            'password'      => '123123',
            'cabang_id'     => 1,
        ]);
        Kurir::create([
            'full_name'     => 'Kurir B1',
            'address_ktp'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'address_now'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'profile_img'   => 'profile_kurir_example.jpg',
            'ktp_img'       => 'ktp_kurir_example.jpg',
            'wa_number'     => '6292210002002',
            'password'      => '123123',
            'cabang_id'     => 2,
        ]);
        Kurir::create([
            'full_name'     => 'Kurir B2',
            'address_ktp'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'address_now'   => 'Jl. Semangka No. 5, Sukajadi, Pekanbaru',
            'profile_img'   => 'profile_kurir_example.jpg',
            'ktp_img'       => 'ktp_kurir_example.jpg',
            'wa_number'     => '6292210002003',
            'password'      => '123123',
            'cabang_id'     => 2,
        ]);
    }
}
