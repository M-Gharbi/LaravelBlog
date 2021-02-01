<?php

namespace App;

use App\Scopes\FilterScope;
//use App\Scopes\SearchScope;
use App\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address','post_id'];
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'post_id', 'user_id'];
    public $filterColumns = ['post_id'];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }
    

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new FilterScope);
        //static::addGlobalScope(new SearchScope);
        static::addGlobalScope(new ContactSearchScope);
    }
}