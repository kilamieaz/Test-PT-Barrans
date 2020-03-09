<?php

namespace App\Http\Handlers\Product;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Resources\ProductResource;

class IndexProduct
{
    protected $product = null;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function __invoke(Request $request)
    {
        return ProductResource::collection($this->product->all());
    }
}
