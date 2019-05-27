<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new User();
        $table->name = 'Admin';
        $table->email = 'admin@admin.com';
        $table->password = bcrypt('123456');
        $table->save();
    }
}
