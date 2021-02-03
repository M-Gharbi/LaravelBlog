<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];

    public function contacts()
    {
        return $this->hasMany(Contact::class)->withoutGlobalScope(SearchScope::class);;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function userPosts()
    {
        return self::where('user_id', auth()->id())->orderBy('title')->pluck('title', 'id')->prepend('All Post', '');
    }

}
