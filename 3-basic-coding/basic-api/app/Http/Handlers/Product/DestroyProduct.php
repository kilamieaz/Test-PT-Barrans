<?php

namespace App\Http\Handlers\Product;

use App\Product;
use Illuminate\Http\Request;

class DestroyProduct
{
    protected $product = null;

    public function __invoke(Request $request, Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'successfully remove product'], 204);
    }
}
