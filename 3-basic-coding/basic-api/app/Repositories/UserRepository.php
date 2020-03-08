<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Model
{
    use Repository;

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    protected $table = 'users';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = app(User::class);
    }
}
