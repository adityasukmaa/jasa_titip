<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::create([
            'customer_name'     => 'Fulan',
            'customer_wa'       => '628225678',
            'customer_address'  => 'Jl. dfsfsdf',
            'lat'               => 10.35345253,
            'long'              => 4.342525532,
            'price'             => 50_000,
            'app_fee'           => 3_000,
            'courir_fee'        => 4_000,
            'cabang_id'         => 1,
            'status'            => 'done',
            'courir_id'         => 1,
            'created_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),

        ]);

        $order->items()->createMany([
            [
                'product_id'        => 1,
                'qty'               => 2,
                'price'             => 15_000,
                'total'             => 30_000
            ],
            [
                'product_id'        => 2,
                'qty'               => 1,
                'price'             => 20_000,
                'total'             => 20_000
            ]
            ]);

            $order = Order::create([
                'customer_name'     => 'Fulan',
                'customer_wa'       => '6282284393018',
                'customer_address'  => 'Jl. dfsfsdf',
                'lat'               => 10.35345253,
                'long'              => 4.342525532,
                'price'             => 50_000,
                'app_fee'           => 3_000,
                'courir_fee'        => 4_000,
                'cabang_id'         => 1,
                'status'            => 'done',
                'courir_id'         => 1,
                'created_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
                'updated_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
            ]);
    
            $order->items()->createMany([
                [
                    'product_id'        => 1,
                    'qty'               => 2,
                    'price'             => 15_000,
                    'total'             => 30_000
                ],
                [
                    'product_id'        => 2,
                    'qty'               => 1,
                    'price'             => 20_000,
                    'total'             => 20_000
                ]
                ]);

                $order = Order::create([
                    'customer_name'     => 'Fulan',
                    'customer_wa'       => '6282284393018',
                    'customer_address'  => 'Jl. dfsfsdf',
                    'lat'               => 10.35345253,
                    'long'              => 4.342525532,
                    'price'             => 35_000,
                    'app_fee'           => 3_000,
                    'courir_fee'        => 4_000,
                    'cabang_id'         => 1,
                    'status'            => 'done',
                    'courir_id'         => 1,
                    'created_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                    'updated_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                ]);
        
                $order->items()->createMany([
                    [
                        'product_id'        => 1,
                        'qty'               => 1,
                        'price'             => 15_000,
                        'total'             => 15_000
                    ],
                    [
                        'product_id'        => 2,
                        'qty'               => 1,
                        'price'             => 20_000,
                        'total'             => 20_000
                    ]
                ]);

                $order = Order::create([
                    'customer_name'     => 'Fulan',
                    'customer_wa'       => '6282284393018',
                    'customer_address'  => 'Jl. dfsfsdf',
                    'lat'               => 10.35345253,
                    'long'              => 4.342525532,
                    'price'             => 15_000,
                    'app_fee'           => 3_000,
                    'courir_fee'        => 4_000,
                    'cabang_id'         => 1,
                    'status'            => 'done',
                    'courir_id'         => 2,
                    'created_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                    'updated_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                ]);
        
                $order->items()->createMany([
                    [
                        'product_id'        => 1,
                        'qty'               => 1,
                        'price'             => 15_000,
                        'total'             => 15_000
                    ]
                ]);
                $order = Order::create([
                    'customer_name'     => 'Fulan',
                    'customer_wa'       => '6282284393018',
                    'customer_address'  => 'Jl. dfsfsdf',
                    'lat'               => 10.35345253,
                    'long'              => 4.342525532,
                    'price'             => 35_000,
                    'app_fee'           => 3_000,
                    'courir_fee'        => 4_000,
                    'cabang_id'         => 1,
                    'status'            => 'done',
                    'courir_id'         => 2,
                    'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
        
                $order->items()->createMany([
                    [
                        'product_id'        => 1,
                        'qty'               => 1,
                        'price'             => 15_000,
                        'total'             => 15_000
                    ],
                    [
                        'product_id'        => 2,
                        'qty'               => 1,
                        'price'             => 20_000,
                        'total'             => 20_000
                    ]
                ]);

                //cabang 2

                $order = Order::create([
                    'customer_name'     => 'Fulan',
                    'customer_wa'       => '628225678',
                    'customer_address'  => 'Jl. dfsfsdf',
                    'lat'               => 10.35345253,
                    'long'              => 4.342525532,
                    'price'             => 30_000,
                    'app_fee'           => 3_000,
                    'courir_fee'        => 4_000,
                    'cabang_id'         => 2,
                    'status'            => 'done',
                    'courir_id'         => 3,
                    'created_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
                    'updated_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
        
                ]);
        
                $order->items()->createMany([
                    [
                        'product_id'        => 1,
                        'qty'               => 2,
                        'price'             => 15_000,
                        'total'             => 30_000
                    ],
                    ]);
        
                    $order = Order::create([
                        'customer_name'     => 'Fulan',
                        'customer_wa'       => '6282284393018',
                        'customer_address'  => 'Jl. dfsfsdf',
                        'lat'               => 10.35345253,
                        'long'              => 4.342525532,
                        'price'             => 20_000,
                        'app_fee'           => 3_000,
                        'courir_fee'        => 4_000,
                        'cabang_id'         => 2,
                        'status'            => 'done',
                        'courir_id'         => 4,
                        'created_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
                        'updated_at'        => Carbon::now()->subDay(2)->format('Y-m-d H:i:s'),
                    ]);
            
                    $order->items()->createMany([
                        
                        [
                            'product_id'        => 2,
                            'qty'               => 1,
                            'price'             => 20_000,
                            'total'             => 20_000
                        ]
                        ]);
        
                        $order = Order::create([
                            'customer_name'     => 'Fulan',
                            'customer_wa'       => '6282284393018',
                            'customer_address'  => 'Jl. dfsfsdf',
                            'lat'               => 10.35345253,
                            'long'              => 4.342525532,
                            'price'             => 40_000,
                            'app_fee'           => 3_000,
                            'courir_fee'        => 4_000,
                            'cabang_id'         => 2,
                            'status'            => 'done',
                            'courir_id'         => 4,
                            'created_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                            'updated_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                        ]);
                
                        $order->items()->createMany([
                            [
                                'product_id'        => 2,
                                'qty'               => 2,
                                'price'             => 20_000,
                                'total'             => 40_000
                            ]
                        ]);
        
                        $order = Order::create([
                            'customer_name'     => 'Fulan',
                            'customer_wa'       => '6282284393018',
                            'customer_address'  => 'Jl. dfsfsdf',
                            'lat'               => 10.35345253,
                            'long'              => 4.342525532,
                            'price'             => 15_000,
                            'app_fee'           => 3_000,
                            'courir_fee'        => 4_000,
                            'cabang_id'         => 2,
                            'status'            => 'done',
                            'courir_id'         => 4,
                            'created_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                            'updated_at'        => Carbon::now()->subDay(1)->format('Y-m-d H:i:s'),
                        ]);
                
                        $order->items()->createMany([
                            [
                                'product_id'        => 1,
                                'qty'               => 1,
                                'price'             => 15_000,
                                'total'             => 15_000
                            ]
                        ]);
                        $order = Order::create([
                            'customer_name'     => 'Fulan',
                            'customer_wa'       => '6282284393018',
                            'customer_address'  => 'Jl. dfsfsdf',
                            'lat'               => 10.35345253,
                            'long'              => 4.342525532,
                            'price'             => 45_000,
                            'app_fee'           => 3_000,
                            'courir_fee'        => 4_000,
                            'cabang_id'         => 2,
                            'status'            => 'done',
                            'courir_id'         => 4,
                            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                        ]);
                
                        $order->items()->createMany([
                            [
                                'product_id'        => 1,
                                'qty'               => 3,
                                'price'             => 15_000,
                                'total'             => 45_000
                            ]
                        ]);
    }
}
