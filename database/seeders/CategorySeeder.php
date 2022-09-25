<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Cars',
                'description' => '',
            ],
            [
                'name' => 'Planes',
                'description' => '',
            ],
            [
                'name' => 'Trucks',
                'description' => '',
            ],
            [
                'name' => 'Boats',
                'description' => '',
            ],
            [
                'name' => 'Rockets',
                'description' => '',
            ],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
