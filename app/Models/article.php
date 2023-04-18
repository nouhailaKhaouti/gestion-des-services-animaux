<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    public function comments()
    {
      return $this->hasMany('App\Models\Comments_article', 'on_article');
    }
    
    // returns the instance of the user who is author of that post
    public function author()
    {
      return $this->belongsTo('App\Models\User', 'author_id');
    }
}
