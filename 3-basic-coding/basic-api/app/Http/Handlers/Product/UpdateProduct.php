<?php

namespace App\Http\Handlers\Product;

use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

class UpdateProduct
{
    public function __invoke(ProductRequest $formRequest, Product $product)
    {
        return new ProductResource($formRequest->process());
    }
}
