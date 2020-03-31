<?php

namespace App\Http\View\Composers;

use App\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CityComposer
{
    private $cities;

    public function __construct(City $cities)
    {
        $this->cities = $cities;
    }

    public function compose(View $view)
    {
        $cities = Cache::remember('cities', 1200, function () {
            return $this->cities->orderBy('name', 'asc')->select('id', 'name')->get();
        });

        return $view->with('cities', $cities);
    }
}

