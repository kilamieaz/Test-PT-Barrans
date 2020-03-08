<?php

namespace App\Http\Handlers\Product;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class StoreProduct
{
    public function __invoke(ProductRequest $formRequest)
    {
        return new ProductResource($formRequest->process());
    }
}
