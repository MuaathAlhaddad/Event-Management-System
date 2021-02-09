<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\MassDestroyUserRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateUserProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::select(User::INDEX_DISPLAY)->paginate(5);
        $roles = Role::all()->pluck('title', 'id');

        return view('users.index', ['users' => $users, 'roles' => $roles]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index')->with('status', 'User created Successfully');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->back()->with('status', 'User updated Successfully');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allRoles = Role::all()->pluck('title', 'id');

        $countries = Country::all();

        $user->load('roles');

        return view('users.show', compact('user', 'allRoles', 'countries'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update_profile(UpdateUserProfileRequest $request) {
        if ($request->hasFile('avatar')) {
            
            $path = Storage::putFile('public/avatars', $request->file('avatar'));

            User::findOrFail($request->user_id)->update(['avatar' => basename($path)]);
        }
        return back()->with('status', 'Profile Updated Successfully');
    }
}
