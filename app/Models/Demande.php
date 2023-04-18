<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = 
    ['category',
    'jour',
    'task',
    'type',
    'breed',
    'status',
    'sitter_id',
    'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setJourAttribute($jour)
    {
        $this->attributes['jour'] = json_encode($jour);
    }

    public function getJourAttribute($jour)
    {
        return $this->attributes['jour'] = json_decode($jour);
    }
    public function setTaskAttribute($task)
    {
        $this->attributes['task'] = json_encode($task);
    }

    public function getTaskAttribute($task)
    {
        return $this->attributes['task'] = json_decode($task);
    }
}
