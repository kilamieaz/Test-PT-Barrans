<?php

namespace App\Repositories;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository extends Model
{
    use Repository;

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    protected $table = 'transactions';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = app(Transaction::class);
    }
}
