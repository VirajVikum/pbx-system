<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        UserType::query()->truncate();

        UserType::create([
            'title'=>'Admin'
        ]);
        UserType::create([
            'title'=>'Supervisor'
        ]);
        UserType::create([
            'title'=>'Agent'
        ]);
        
    }
}
