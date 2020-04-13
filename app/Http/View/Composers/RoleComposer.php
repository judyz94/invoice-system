<?php

namespace App\Http\View\Composers;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class RoleComposer
{
    private $roles;

    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    public function compose(View $view)
    {
        $roles = Cache::remember('roles',  1200, function () {
            return $this->roles->orderBy('name', 'asc')->select('id', 'name')->get();
        });

        return $view->with('roles', $roles);
    }
}

