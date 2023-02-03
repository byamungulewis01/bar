<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::where('guard_name','web')->with('users')->get();
        $user = User::all();
        $permissions = Permission::get();
        
        return view('roles', compact('roles','user','permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            'express' => 'required'
        ]);
        
        $express = $request->express;
        $permission = array_keys($request->get('permission'));
        
        if(!$express)
        {
            $name = Role::where('name',$request->name)->first();
            if($name){
                throw ValidationException::withMessages([
                    'name' => 'The name has already been taken.'
                ]);
            }
            $role = Role::create(['name' => $request->get('name')]);
            $role->syncPermissions($permission);

            return back()->with('message','Role created successfully');
        }
        else{
            $role=Role::findorfail($express);
            $role->update($request->only('name'));
            $role->syncPermissions($permission);

            return back()->with('message','Role updated successfully');
        }
    }

    public function assign(User $user, Request $request)
    {
        $this->validate($request, [
            'roles' => 'required',
        ]);

        $newRoles = [];
        foreach(json_decode($request->roles) as $role){
            array_push($newRoles,$role->value);
        }
        $user->syncRoles($newRoles);
        return back()->with('message','Role assigned successfully');
    }

    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions;

        return view('roles.show', compact('role','rolePermissions'));
    }

    public function edit(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role->update($request->only('name'));
        $role->syncPermissions($request->get('permission'));

        return back()->with('message','Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $this->validate($request, [
            'express' => 'required'
        ]);
        $role=Role::findorfail($express);
        $role->delete();
        return back()->with('message','Role deleted successfully');
    }
}
