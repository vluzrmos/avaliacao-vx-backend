<?php
namespace App\Repositories;

use App\Models\Sale;

class SaleRepository extends Repository
{
    protected $modelClass = Sale::class;

    public function syncProducts(Sale $sale, $products = [])
    {
        $sync = [];

        foreach ($products as $product) {
            $id = data_get($product, 'product_id', function () use (&$product) {
                return data_get($product, 'id');
            });
            
            $amount = data_get($product, 'amount', 0);
            $quantity = data_get($product, 'quantity', 0);
            $price = data_get($product, 'price', 0);

            $sync[$id] = compact('amount', 'quantity', 'price');
        }

        return $sale->products()->sync($sync);
    }
}
