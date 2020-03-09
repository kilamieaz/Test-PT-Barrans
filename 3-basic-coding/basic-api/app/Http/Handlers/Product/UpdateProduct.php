<?php

namespace App\Http\Handlers\Product;

use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\UpdateProductRequest;

class UpdateProduct
{
    public function __invoke(UpdateProductRequest $formRequest, Product $product)
    {
        return new ProductResource($formRequest->process());
    }
}
