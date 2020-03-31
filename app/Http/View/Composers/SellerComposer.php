<?php

namespace App\Http\View\Composers;

use App\Seller;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SellerComposer
{
    private $sellers;

    public function __construct(Seller $sellers)
    {
        $this->sellers = $sellers;
    }

    public function compose(View $view)
    {
        $sellers = Cache::remember('sellers', 600, function () {
            return $this->sellers->orderBy('full_name', 'asc')->select('id', 'full_name')->get();
        });

        return $view->with('sellers', $sellers);
    }
}

