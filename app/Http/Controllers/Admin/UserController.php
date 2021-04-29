<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '<>', 1)->get();
        return view('dashboard/admin/users/index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('dashboard/admin/users/create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            User::create([
                'role_id' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();
            return redirect()->route('dashboard.admin.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('dashboard/admin/users/edit', compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        try {
            DB::beginTransaction();

            $user->update([
                'role_id' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            if (!is_null($request->password)) {
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            DB::commit();
            return redirect()->route('dashboard.admin.users.index');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
