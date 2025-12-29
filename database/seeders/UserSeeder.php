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
        User::query()->truncate();

        User::create([
            'name' => 'admin',
            'email' => 'achintha@ausoworld.com',
            'password' => Hash::make('admin'),
            'user_type_id' => 1,
        ]);
    }
}
