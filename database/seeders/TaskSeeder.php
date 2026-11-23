<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Review Laravel Mail Documentation',
            'description' => 'Read through Mailable setup and log driver configuration.',
            'status' => 'pending',
            'is_archived' => false,
        ]);

        Task::create([
            'title' => 'Setup Breeze Authentication',
            'description' => 'Scaffold Breeze Blade stack and protect management routes.',
            'status' => 'done',
            'is_archived' => false,
        ]);
    }
}