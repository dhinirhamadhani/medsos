<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email'=>'yllwdin20@gmail.com',
            'password'=>bcrypt('yllwdin20'),
            'name'=>'yllwdin',
        ]);
    }
}
