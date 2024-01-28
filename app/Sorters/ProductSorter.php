<?php 

namespace App\Sorters;

interface ProductSorter
{
    public function sort(array $products): array;
}