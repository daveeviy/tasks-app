<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        Task::firstOrCreate(
            ['title' => 'Review TSA4 requirements'],
            [
                'description' => 'Verify public routes, Breeze auth, archiving, and completion email.',
                'status' => 'pending',
                'is_archived' => false,
            ]
        );
    }
}