<?php 

namespace App;

use App\Models\Product;
use App\Sorters\ProductSorter;

class Catalog
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = array_map(function ($product) {
            if (is_array($product)) {

                return new Product(
                    $product['id'],
                    $product['name'],
                    $product['price'],
                    $product['created'],
                    $product['sales_count'],
                    $product['views_count']
                );
                
            }

            return null;

        }, $products);
    }

    public function getProducts(ProductSorter $sorter): array
    {
        return $sorter->sort($this->products);
    }
}