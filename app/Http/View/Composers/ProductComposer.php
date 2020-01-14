<?php

namespace App\Http\View\Composers;

use App\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ProductComposer
{
    private $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function compose(View $view)
    {
        $products = Cache::remember('products',  60, function () {
            return $this->products->orderBy('name', 'asc')->select('id', 'name')->get();
        });

        return $view->with('products', $products);
    }
}

