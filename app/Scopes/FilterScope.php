<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($postId = request('post_id')) {
            $builder->where('post_id', $postId);
        }
    }
}