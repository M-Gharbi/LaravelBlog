<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address','post_id'];
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }
    
    public function scopeFilter($query)
    {
        if ($postId = request('post_id')) {
            $query->where('post_id', $postId);
        }

        if ($search = request('search')) {
            $query->where('first_name', 'LIKE', "%{$search}%");
        }

        return $query;
    }
}