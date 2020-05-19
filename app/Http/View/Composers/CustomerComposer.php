<?php

namespace App\Http\View\Composers;

use App\Customer;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CustomerComposer
{
    private $customers;

    public function __construct(Customer $customers)
    {
        $this->customers = $customers;
    }

    public function compose(View $view)
    {
       $customers = Cache::remember('customers',  600, function () {
            return $this->customers->orderBy('full_name', 'asc')->select('id', 'full_name')->get();
        });

        return $view->with('customers', $customers);
    }
}

