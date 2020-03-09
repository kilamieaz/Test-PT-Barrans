<?php

namespace App\Http\Handlers\Transaction;

use App\Http\Resources\TransactionResource;
use App\Http\Requests\StoreTransactionRequest;
use Illuminate\Support\Facades\DB;

class StoreTransaction
{
    public function __invoke(StoreTransactionRequest $formRequest)
    {
        $response = DB::transaction(function () use ($formRequest) {
            $formRequest->user()->pointIncrement();
            return $formRequest->process();
        });
        return new TransactionResource($response);
    }
}
