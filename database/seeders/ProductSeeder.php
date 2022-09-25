<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Convertible Car',
                'description' => 'This convertible car is fast! The engine is powered by a neutrino based battery (not included). Power it up and let it go!',
                'image_path' => 'carconvert.png',
                'unit_price' => 22.50,
                'category_id' => 1,
            ],
            [
                'name' => 'Old-time Car',
                'description' => "There's nothing old about this toy car, except it's looks. Compatible with other old toy cars.",
                'image_path' => 'carearly.png',
                'unit_price' => 15.95,
                'category_id' => 1,
            ],
            [
                'name' => 'Fast Car',
                'description' => 'Yes this car is fast, but it also floats in water.',
                'image_path' => 'carfast.png',
                'unit_price' => 32.99,
                'category_id' => 1,
            ],
            [
                'name' => 'Super Fast Car',
                'description' => 'Use this super fast car to entertain guests. Lights and doors work!',
                'image_path' => 'carfaster.png',
                'unit_price' => 8.95,
                'category_id' => 1,
            ],
            [
                'name' => 'Old Style Racer',
                'description' => 'This old style racer can fly (with user assistance). Gravity controls flight duration. No batteries required.',
                'image_path' => 'carracer.png',
                'unit_price' => 34.95,
                'category_id' => 1,
            ],
            [
                'name' => 'Ace Plane',
                'description' => 'Authentic airplane toy. Features realistic color and details.',
                'image_path' => 'planeace.png',
                'unit_price' => 95.00,
                'category_id' => 2,
            ],
            [
                'name' => 'Glider',
                'description' => 'This fun glider is made from real balsa wood. Some assembly required.',
                'image_path' => 'planeglider.png',
                'unit_price' => 4.95,
                'category_id' => 2,
            ],
            [
                'name' => 'Paper Plane',
                'description' => 'This paper plane is like no other paper plane. Some folding required.',
                'image_path' => 'planepaper.png',
                'unit_price' => 2.95,
                'category_id' => 2,
            ],
            [
                'name' => 'Propeller Plane',
                'description' => 'Rubber band powered plane features two wheels.',
                'image_path' => 'planeprop.png',
                'unit_price' => 32.95,
                'category_id' => 2,
            ],
            [
                'name' => 'Early Truck',
                'description' => 'This toy truck has a real gas powered engine. Requires regular tune ups.',
                'image_path' => 'truckearly.png',
                'unit_price' => 15.00,
                'category_id' => 3,
            ],
            [
                'name' => 'Fire Truck',
                'description' => 'You will have endless fun with this one quarter sized fire truck.',
                'image_path' => 'truckfire.png',
                'unit_price' => 26.00,
                'category_id' => 3,
            ],
            [
                'name' => 'Big Truck',
                'description' => 'This fun toy truck can be used to tow other trucks that are not as big.',
                'image_path' => 'truckbig.png',
                'unit_price' => 29.00,
                'category_id' => 3,
            ],
            [
                'name' => 'Big Ship',
                'description' => 'Is it a boat or a ship. Let this floating vehicle decide by using its artifically intelligent computer brain!',
                'image_path' => 'boatbig.png',
                'unit_price' => 95.00,
                'category_id' => 4,
            ],
            [
                'name' => 'Paper Boat',
                'description' => 'Floating fun for all! This toy boat can be assembled in seconds. Floats for minutes! Some folding required.',
                'image_path' => 'boatpaper.png',
                'unit_price' => 4.95,
                'category_id' => 4,
            ],
            [
                'name' => 'Sail Boat',
                'description' => 'Put this fun toy sail boat in the water and let it go!',
                'image_path' => 'boatsail.png',
                'unit_price' => 42.95,
                'category_id' => 4,
            ],
            [
                'name' => 'Rocket',
                'description' => 'This fun rocket will travel up to a height of 200 feet.',
                'image_path' => 'rocket.png',
                'unit_price' => 122.95,
                'category_id' => 5,
            ],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}