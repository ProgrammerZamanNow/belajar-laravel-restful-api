<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'test',
            'password' => Hash::make('test'),
            'name' => 'test',
            'token' => 'test'
        ]);

        User::create([
            'username' => 'test2',
            'password' => Hash::make('test2'),
            'name' => 'test2',
            'token' => 'test2'
        ]);
    }
}
