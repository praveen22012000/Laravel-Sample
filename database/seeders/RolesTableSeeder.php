<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;//this is written by me
//use Database\Seeders\Carbon;//this is written by me
use Carbon\Carbon; 

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert(
            [

            'name'=>'Admin',
            'permission'=>'no',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
            
            ]);

        DB::table('roles')->insert(
            [
                'name'=>'Editor',
                'permission'=>'yes',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        );        
    }
}
