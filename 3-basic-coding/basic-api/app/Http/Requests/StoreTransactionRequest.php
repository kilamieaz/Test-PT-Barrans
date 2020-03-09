<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\TransactionRepository;

class StoreTransactionRequest extends FormRequest
{
    protected $transaction = null;

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|numeric',
            'product_id' => 'required|integer|numeric',
            'quantity' => 'required|integer|numeric'
        ];
    }

    public function process()
    {
        return tap($this->transaction->create($this->validated()));
    }
}
