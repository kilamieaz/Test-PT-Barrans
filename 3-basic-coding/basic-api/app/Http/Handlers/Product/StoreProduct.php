<?php

namespace App\Http\Handlers\Product;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;

class StoreProduct
{
    public function __invoke(StoreProductRequest $formRequest)
    {
        return new ProductResource($formRequest->process());
    }
}
