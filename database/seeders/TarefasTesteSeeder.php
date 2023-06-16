<?php

namespace Database\Seeders;
use App\Models\Task;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefasTesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Task::factory()->count(10)->create();
    }
}
