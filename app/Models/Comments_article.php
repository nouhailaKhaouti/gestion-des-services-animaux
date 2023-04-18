<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments_article extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function author()
    {
      return $this->belongsTo('App\Models\User', 'from_user');
    }
    
    // returns post of any comment
    public function article()
    {
      return $this->belongsTo('App\Models\Article', 'on_article');
    }
}
