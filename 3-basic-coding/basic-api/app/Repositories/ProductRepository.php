<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends Model
{
    use Repository;

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    protected $table = 'products';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = app(Product::class);
    }
}
