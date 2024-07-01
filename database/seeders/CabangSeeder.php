<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            'name'          => 'Cabang A',
            'keterangan'    => 'Desa Sukajadi',

        ]);
        Cabang::create([
            'name'          => 'Cabang B',
            'keterangan'    => 'Desa Sukadamai',
        ]);
       
    }
}
