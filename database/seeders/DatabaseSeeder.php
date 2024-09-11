<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       User::factory()->create([
            'name' => 'Test User',
            'email' => 'test4@example.com',
           'lastname'=>'kumar',
               'password'=>'123456789',
               'address'=>'jaffna',
               'phone_number'=>'0771234567'
           
   
        ]);

        $this->call(RolesTableSeeder::class);//this is written by me
        $this->call(RoleSeeder::class);//this is written by me
    }
}
