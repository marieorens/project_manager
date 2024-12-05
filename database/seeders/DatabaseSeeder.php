<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;
use App\Models\Notification;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
       $adminUser = User::create([
        'name' => 'Admin User',
        'email' => 'admine@example.com',
        'password' => Hash::make('password123')
    ]);

    $normalUser = User::create([
        'name' => 'Normal User',
        'email' => 'usere@example.com',
        'password' => Hash::make('password123')
    ]);

    $normalUser1 = User::create([
        'name' => 'Normal User 1',
        'email' => 'user1e@example.com',
        'password' => Hash::make('password1234')
    ]);

    $normalUser = User::create([
        'name' => 'Normal User 2',
        'email' => 'user2e@example.com',
        'password' => Hash::make('password1235')
    ]);

    $normalUser = User::create([
        'name' => 'administreur',
        'email' => 'administrateur@example.com',
        'password' => Hash::make('adminproject15'),
        'role'=>'admin']);

    $normalUser = User::create([
        'name' => 'Normal User 3',
        'email' => 'user3e@example.com',
        'password' => Hash::make('password1235')
    ]);

    $normalUser = User::create([
        'name' => 'Mary Reose',
        'email' => 'marye@example.com',
        'password' => Hash::make('password1235')
    ]);

    $normalUser = User::create([
        'name' => 'John Doee',
        'email' => 'johndoe@example.com',
        'password' => Hash::make('password1235')
    ]);
   
    $normalUser = User::create([
        'name' => 'Luke Arhure',
        'email' => 'lucarthur@example.com',
        'password' => Hash::make('password1235')
    ]);

   
    $project1 = Project::create([
        'title' => 'Project 1e',
        'description' => 'Description for project 1',
        'status' => 'en cours',
        'deadline' => now()->addDays(10),
        'user_id' => $adminUser->id
    ]);

    $normalUser = User::create([
        'name' => 'Orense',
        'email' => 'orensmarie601@gmail.com',
        'password' => Hash::make('orens2580')
    ]);

    $project2 = Project::create([
        'title' => 'Project 2e',
        'description' => 'Description for project 2',
        'status' => 'non commencé',
        'deadline' => now()->addDays(15),
        'user_id' => $normalUser->id
    ]);

    
    Task::create([
        'title' => 'Task 1 for Project 1e',
        'description' => 'This is a task for project 1.',
        'status' => 'en cours',
        'priority' => 'haute',
        'project_id' => $project1->id,
        'assigned_to' => $adminUser->id
    ]);

    Task::create([
        'title' => 'Task 2 for Project 1',
        'description' => 'This is another taske for project 1.',
        'status' => 'non commencé',
        'priority' => 'moyenne',
        'project_id' => $project1->id,
        'assigned_to' => $normalUser->id
    ]);

    Task::create([
        'title' => 'Task 1 for Project 2',
        'description' => 'This is a taske for project 2.',
        'status' => 'terminé',
        'priority' => 'basse',
        'project_id' => $project2->id,
        'assigned_to' => $normalUser->id
    ]);
}
    
}
