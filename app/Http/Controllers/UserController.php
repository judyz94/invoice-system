<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Contracts\View\Factory;
use Exception;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:users.index')->only(['index']);
        $this->middleware('can:users.edit')->only(['edit', 'update']);
        $this->middleware('can:users.show')->only(['show']);
        $this->middleware('can:users.destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function index(User $user)
    {
        $users = User::paginate(5);

        return view('users.index', compact( 'users'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user)
    {
        return view('users.show',  compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit',  compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->document = $request->input('document');
        $user->email = $request->input('email');
        $user->save();

        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index')->with('info', 'User successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('info', 'User successfully deleted.');
    }
}

