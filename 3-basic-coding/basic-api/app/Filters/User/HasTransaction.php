<?php

namespace App\Filters\User;

use Illuminate\Database\Eloquent\Builder;

class HasTransaction implements Contract
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereHas('transactions')->with('transactions');
    }
}
