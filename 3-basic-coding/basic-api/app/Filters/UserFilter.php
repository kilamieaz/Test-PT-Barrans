<?php

namespace App\Filters;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class UserFilter
{
    public static function apply(array $filters)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new User)->newQuery());

        return static::getResults($query);
    }

    private static function applyDecoratorsFromRequest(array $request, Builder $query)
    {
        foreach ($request as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\User\\' . Str::studly($name);
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query)
    {
        return $query->get();
    }
}
