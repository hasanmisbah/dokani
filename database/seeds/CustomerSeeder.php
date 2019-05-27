<?php

use App\Customer;
use Illuminate\Database\Seeder;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++){
            $table = new Customer();
            $table->sn = $faker->unique()->numerify('C ###');
            $table->name = $faker->title.' '.$faker->firstName.''.$faker->lastName;
            $table->contact = $faker->e164PhoneNumber;
            $table->email = $faker->email;
            $table->address = $faker->address;
            $table->save();

        }

    }
}
