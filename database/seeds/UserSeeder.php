<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
   {
     User::create(array(
       'name' => ('Charlotte Voskuilen'),
       'email' => ('charlotte@gmail.com'),
       'password' => bcrypt('qwerty'),
     ));
   }
}
