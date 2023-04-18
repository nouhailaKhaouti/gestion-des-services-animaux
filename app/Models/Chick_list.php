<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chick_list extends Model
{
    use HasFactory;
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
