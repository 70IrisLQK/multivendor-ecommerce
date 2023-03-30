<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Perxsion',
                'is_featured' => '1',
            ],
            [
                'name' => 'Hiching',
                'is_featured' => '1',
            ],
            [
                'name' => 'Kepslo',
                'is_featured' => '1',
            ],
            [
                'name' => 'Groneba',
                'is_featured' => '1',
            ],
            [
                'name' => 'Babian',
                'is_featured' => '1',
            ],
            [
                'name' => 'Valorant',
                'is_featured' => '1',
            ],
            [
                'name' => 'Pure',
                'is_featured' => '1',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate($brand);
        }
    }
}