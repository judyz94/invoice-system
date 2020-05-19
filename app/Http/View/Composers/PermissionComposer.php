<?php

namespace App\Http\View\Composers;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PermissionComposer
{
    private $permissions;

    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }

    public function compose(View $view)
    {
        $permissions = Cache::remember('permissions',  1200, function () {
            return $this->permissions->orderBy('name', 'asc')->select('id', 'name')->get();
        });

        return $view->with('permissions', $permissions);
    }
}

