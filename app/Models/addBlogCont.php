<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addBlogCont extends Model
{
    use HasFactory;
    public $table='blog';

    public function comments()
    {
        return $this->hasMany(Comment::class,'bid');
    }
    
    public function userName()
    {
        return $this->belongsTo(User::class,'userid');
    }
}
