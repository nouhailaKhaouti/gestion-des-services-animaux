<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class post extends Model
{
    use HasFactory, SoftDeletes;
    use Notifiable;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'titre',
    'description',
    'tag',
    'video',
    'status',
    'likes',
    'user_id'];

    /**
     * Write Your Code..
     *
     * @return string
    */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likePlus()
    {
        $this->increment('likes');
        $this -> update ();
    }

    public function dislikePlus()
    {
        $this->update([
            'likes'=> $this->decrement('likes')
        ]);
    }
}
