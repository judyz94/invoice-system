<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use Caffeinated\Shinobi\Models\Permission;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('permissions.index', compact( 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $permission = new Permission();

        return view('permissions.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->slug = $request->input('slug');
        $permission->description = $request->input('description');

        $permission->save();

        return redirect()->route('permissions.index')->with('info', 'Permission successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Factory|View
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit',  compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Permission $permission)
    {
        $permission->name = $request->input('name');
        $permission->slug = $request->input('slug');
        $permission->description = $request->input('description');

        $permission->save();

        return redirect()->route('permissions.index')->with('info', 'Permission successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('info', 'Permission successfully deleted.');
    }
}

