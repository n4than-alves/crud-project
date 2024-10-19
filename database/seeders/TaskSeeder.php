<?php

namespace Database\Seeders;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
   
    public function run(): void
    {
        //cria 50 tarefas usando a factory
        Task::factory()->count(50)->create();
    }
}
