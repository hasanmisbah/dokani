<?php

use Illuminate\Database\Seeder;
use App\Customer;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i =0; $i < 100; $i++){
            $table = new Supplier();
            $table->sn = $faker->unique()->numerify('SUP ###');
            $table->name = $faker->title.' '.$faker->firstName.''.$faker->lastName;
            $table->contact = $faker->e164PhoneNumber;
            $table->email =$faker->email;
            $table->address = $faker->address;
            $table->save();

        }
    }
}
