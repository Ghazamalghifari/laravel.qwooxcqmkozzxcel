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
        // Membuat sample admin
        $admin = new User();
        $admin->name= 'it';
        $admin->email = 'it@gmail.com';
        $admin->password = bcrypt('armagedon');
        $admin->save(); 

    }
}
