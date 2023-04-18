<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sitter extends Model
{
    use HasFactory;
    protected $fillable = ['type','category','jour','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    public function setJourAttribute($jour)
    {
        $this->attributes['jour'] = json_encode($jour);
    }

    public function getJourAttribute($jour)
    {
        return $this->attributes['jour'] = json_decode($jour);
    }
    public function setTypeAttribute($type)
    {
        $this->attributes['type'] = json_encode($type);
    }

    public function getTypeAttribute($type)
    {
        return $this->attributes['type'] = json_decode($type);
    }
    public function setCategoryAttribute($category)
    {
        $this->attributes['category'] = json_encode($category);
    }

    public function getCategoryAttribute($category)
    {
        return $this->attributes['category'] = json_decode($category);
    }
}
