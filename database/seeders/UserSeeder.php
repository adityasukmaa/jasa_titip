<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create([
            'username'      => 'superadmin',
            'full_name'     => 'Super Admin',
            'wa_number'     => '6282284393018',
            'password'      => '123123',
            'role'          => 'superadmin',
            'img_name'      => 'default.jpg',
        ]);

        User::create([
            'username'      => 'admin_a',
            'full_name'     => 'admin cabang A',
            'wa_number'     => '6282284393019',
            'password'      => '123123',
            'role'          => 'admin',
            'cabang_id'     => 1,
            'img_name'      => 'default.jpg',

        ]);
        User::create([
            'username'      => 'admin_b',
            'full_name'     => 'admin cabang B',
            'wa_number'     => '6282284393020',
            'password'      => '123123',
            'role'          => 'admin',
            'cabang_id'     => 2,
            'img_name'      => 'default.jpg',
        ]);
    }
}
