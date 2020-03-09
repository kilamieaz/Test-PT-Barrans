<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
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
            'name' => 'string|min:3',
            'price' => 'integer|numeric',
            'description' => 'string|min:3'
        ];
    }

    public function product()
    {
        //route model binding
        return $this->route('product');
    }

    public function process()
    {
        return tap($this->product())->update($this->validated());
    }
}
