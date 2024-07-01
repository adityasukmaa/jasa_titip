<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CabangSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KurirSeeder::class);
        $this->call(TokoSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(AdsSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(SettingSeeder::class);

    }
}
