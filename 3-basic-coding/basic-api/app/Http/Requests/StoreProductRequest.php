<?php

namespace App\Http\Requests;

use App\Repositories\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    protected $product = null;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
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
            'name' => 'required|string|min:3',
            'price' => 'required|integer|numeric',
            'description' => 'required|string|min:3'
        ];
    }

    public function process()
    {
        return tap($this->product->create($this->validated()));
    }
}
