<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends Repository
{
    protected $modelClass = Product::class;

    public function search($value)
    {
        return $this->model()
            ->where('name', 'LIKE', '%'.$value.'%')
            ->orWhere('reference', 'LIKE', '%'.$value.'%')
            ->get();
    }


}
