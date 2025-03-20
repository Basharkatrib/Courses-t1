<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    
    public function run(): void
    {
        FacadesDB::table('users')->insert([
            
            [
                'name' => 'admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
    
        ]);
    }
}
