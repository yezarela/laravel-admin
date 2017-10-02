<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class RolesController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $all = collect($roles)->map(function ($item, $key) {
            $item->all_permissions = collect($item->permissions)->map(function ($p, $k) {
                return $p->name;
            })->implode(', ');
            return $item;
        });

        return view('pages.roles.roles', [
            'roles' => $all,
         ]);
    }

    public function new()
    {
        $permissions = Permission::all();
        $groups = collect($permissions)->groupBy(function ($item, $key) {
            return explode('_', $item->name)[1];
        })->map(function ($item, $key) {
            $result['group_name'] = explode('_', $item[0]->name)[1];
            $result['permissions'] = $item;
            return $result;
        });

        return view('pages.roles.roles-new', [
            'groups' => $groups
         ]);
    }


    public function create(Request $request)
    {
        $role = Role::create(['name' => strtolower($request->role_name)]);
        $permissions = $request->input('permissions');
        if ($permissions) {
            $role->syncPermissions($permissions);
        }       
        //  Log::info($permissions);
        return redirect('admin/settings/roles');
    }


    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $permissions = Permission::all();        
        $groups = collect($permissions)->groupBy(function ($item, $key) {
            return explode('_', $item->name)[1];
        })->map(function ($item, $key) {
            $result['group_name'] = explode('_', $item[0]->name)[1];
            $result['permissions'] = $item;
            return $result;
        });        

        return view('pages.roles.roles-edit', [
          'role' => $role,
          'groups' => $groups
        ]);
    }


    public function update(Request $request)
    {
        $permissions = $request->input('permissions');
       
        Role::where('id', $request->id)
          ->update([
            'name' => $request->role_name,
          ]);
        
        if ($permissions) {
            $role = Role::where('id', $request->id)->first();
            $role->syncPermissions($permissions);
        }
       
        return redirect('admin/settings/roles');
    }
    

    public function delete($id)
    {
        $delete = Role::where('id', $id)->delete();
        return redirect('admin/settings/roles');
    }
}
