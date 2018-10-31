<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // bulbs
        for ($i=1; $i <= 10; $i++) {
            Product::create([
                'name' => 'bulb '.$i,
                'slug' => 'bulb-'.$i,
                'price'=> rand(50000, 1000000),
                'specifications' => [5,7,11][array_rand([5,7,11])] . ' Watts, ',
                'details' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);

        // cameras
        for ($i=1; $i <= 10; $i++) {
            Product::create([
                'name' => 'camera '.$i,
                'slug' => 'camera-'.$i,
                'price'=> rand(50000, 1000000),
                'specifications' => [90,180,360][array_rand([90,180,360])] . ' Degrees, ',
                'details' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(2);
        }

        // plugs
        for ($i=1; $i <= 10; $i++) {
            Product::create([
                'name' => 'plug '.$i,
                'slug' => 'plug-'.$i,
                'price'=> rand(50000, 1000000),
                'specifications' => [90,180,360][array_rand([90,180,360])] . ' Degrees, ',
                'details' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(3);
        }
    }
}
