<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titel', 'comment', 'user_id', 'parent_id'];
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }
}

