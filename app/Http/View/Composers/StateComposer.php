<?php

namespace App\Http\View\Composers;

use App\State;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class StateComposer
{
    private $states;

    public function __construct(State $states)
    {
        $this->states = $states;
    }

    public function compose(View $view)
    {
        $states = Cache::remember('states',  1200, function () {
            return $this->states->orderBy('name', 'asc')->select('id', 'name')->get();
        });

        return $view->with('states', $states);
    }
}

