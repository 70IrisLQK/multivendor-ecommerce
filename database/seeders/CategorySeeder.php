<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Milks and Dairies',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-1',
            ],
            [
                'name' => 'Clothing & beauty',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-2',
            ],
            [
                'name' => 'Pet Toy',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-3',
            ],
            [
                'name' => 'Baking material',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-4',
            ],
            [
                'name' => 'Fresh Fruit',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-5',
            ],
            [
                'name' => 'Wines & Drinks',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-6',
            ],
            [
                'name' => 'Fresh Seafood',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-7',
            ],
            [
                'name' => 'Fast food',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-8',
            ],
            [
                'name' => 'Vegetables',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-9',
            ],
            [
                'name' => 'Bread and Juice',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-10',
            ],
            [
                'name' => 'Cake & Milk',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-1',
            ],
            [
                'name' => 'Coffee & Teas',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-2',
            ],
            [
                'name' => 'Pet Foods',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-3',
            ],
            [
                'name' => ' Diet Foods',
                'is_featured' => '1',
                'image' => 'frontend\assets\imgs\shop\cat-4',
            ],
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}