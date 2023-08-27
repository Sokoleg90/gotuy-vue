<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Oleg',
            'email' => 'sokoleg1990@gmail.com',
            'password' => bcrypt('student1990'),
            'email_verified' => now(),
            'is_admin' => true
        ]);
    }
}
