<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{


    protected $fillable = [
        'data', 'user_id', 'notifiable_type','notifiable_id','read_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    
    }
    public function notifiable()
    {
        return $this->morphTo();
    }
}