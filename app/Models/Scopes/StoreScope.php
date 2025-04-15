<?php

namespace App\Models\Scopes;



use Illuminate\Support\Facades\Auth;
use App\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
class StoreScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
            if (Auth::check()) {
                $user = Auth::user();
                $builder->whereIn('stores.id', function ($query) use ($user) {
                    $query->select('store_id')
                          ->from('store_users')
                          ->where('user_id', $user->id);
                });
            }
    }
}
