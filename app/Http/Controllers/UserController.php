<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $title = "User Management";
        return view('users.index', ['users' => $model->paginate(15), 'title' => $title]);
    }

    public function create()
    {
        $title = "Create new user";
        return view('users.create', compact('title'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->name),
        ];

        User::create($data);
        return redirect()->route('users')->withStatus(__('User has been created successfully.'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $title = "Edit User";

        return view('users.edit', compact('user', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
        ];

        if ($request->password != null) {
            $rules['password'] = 'required|confirmed|min:8|string';
            $data['password'] = Hash::make($request->password);
        }

        $this->validate($request, $rules);

        $user->update($data);

        return redirect()->route('users')->withStatus(__('User has been updated successfully.'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users')->withStatus(__('User has been deleted successfully.'));
    }

}