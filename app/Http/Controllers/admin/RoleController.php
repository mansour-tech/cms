<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function store(Request $request)
    { 
        $this->role::find($request->role_id)->permissions()->sync($request->permission);
        return back()->with('success',trans('alerts.success'));
    }

    public function getByRole(Request $data)
    {
        $permissions = $this->role::find($data->id)->permissions()->pluck('permission_id');

        return $permissions;
    }
}
