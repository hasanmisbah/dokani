<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $cat = ['Electronic', 'Accessories', 'Home Appliances', 'Health', 'Babies', 'Toys', 'Fashion'];
        $unit = ['cm', 'm', 'kg', 'ft', 'pcs', 'sqf'];
        for($i =0; $i < 200; $i++){
            $price = rand(100,1000);
            $buyprice = $price - rand(10,100);
            $catKy = array_rand($cat);
            $uKy = array_rand($unit);

            $table = new Product();
            $table->sku = $faker->ean8;
            $table->name = $faker->firstName;
            $table->category = $cat[$catKy];
            $table->description =$faker->sentence;
            $table->units =  $unit[$uKy];
            $table->price = $price;
            $table->buy_price = $buyprice;
            $table->limits =   rand(10,50);
            $table->save();

        }
    }
}
