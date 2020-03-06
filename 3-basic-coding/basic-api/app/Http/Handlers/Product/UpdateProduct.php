<?php

namespace App\Http\Handlers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class UpdateProduct
{
    public function __invoke(Request $request, Product $product)
    {
        $product->update($request->only($product->fillable));
        return new ProductResource($product);
    }
}
