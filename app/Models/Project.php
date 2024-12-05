<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'deadline', 'status', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

}