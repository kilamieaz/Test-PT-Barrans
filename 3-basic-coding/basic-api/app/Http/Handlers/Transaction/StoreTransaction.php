<?php

namespace App\Http\Handlers\Transaction;

use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;
use App\Http\Resources\TransactionResource;

class StoreTransaction
{
    protected $transaction = null;

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(Request $request)
    {
        $transaction = $this->transaction->create($request->only($this->transaction->fillable));
        return new TransactionResource($transaction);
    }
}
