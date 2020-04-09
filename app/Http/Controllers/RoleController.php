<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Caffeinated\Shinobi\Models\Role;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.index')->only(['index']);
        $this->middleware('can:roles.create')->only(['create', 'store']);
        $this->middleware('can:roles.edit')->only(['edit', 'update']);
        $this->middleware('can:roles.destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('roles.index', compact( 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Role $role
     * @return Factory|View
     */
    public function create(Role $role)
    {
        $role = new Role();

        return view('roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');

        $role->save();

        return redirect()->route('roles.index')->with('info', 'Role successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        return view('roles.edit',  compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');

        $role->save();

        return redirect()->route('roles.index')->with('info', 'Role successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('info', 'Role successfully deleted.');
    }
}

