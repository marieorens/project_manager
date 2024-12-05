<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NotificationController;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']); 
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});






Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/nouveau_projet', [ProjectController::class, 'nouveau_projet'])->name('projects.newproject');
    Route::post('/projects', [ProjectController::class, 'sauvegarder_nouveau_projet'])->name('projects.sauvegarder_nouveau_projet');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('projects.tasks.create');
    Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');


    Route::middleware(['auth','admin'])->group(function () {
        Route::get('/admin/users-with-projects', [AdminController::class, 'showUsersWithProjects'])->name('admin.projets-utilisateurs');
        Route::get('/admin/users/{userId}/create-project', [AdminController::class, 'createProjectForm'])->name('admin.create_project');
        Route::post('/admin/users/{userId}/store-project', [AdminController::class, 'storeProject'])->name('admin.store_project');
        Route::get('/admin/projects/{projectId}/edit', [AdminController::class, 'editProjectForm'])->name('admin.edit_project');
        Route::post('/admin/projects/{projectId}/update', [AdminController::class, 'updateProject'])->name('admin.update_project');
        Route::delete('/admin/projects/{projectId}/delete', [AdminController::class, 'deleteProject'])->name('admin.delete_project');
        Route::get('/admin/users/{userId}/edit', [AdminController::class, 'editUserForm'])->name('admin.edit_user');
        Route::put('/admin/users/{userId}/update', [AdminController::class, 'updateUser'])->name('admin.update_user');
        Route::delete('/admin/users/{userId}/delete', [AdminController::class, 'deleteUser'])->name('admin.delete_user');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::patch('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    });
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
