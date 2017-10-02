<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\User;
use Auth;


class UsersController extends Controller
{
    public function index()
    {
        return view('pages.users.users');
    }

    
    public function new()
    {
        $roles = Role::all();
        return view('pages.users.users-new', [
            'roles' => $roles
        ]);
    }

   
    protected function validateCreate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    protected function validateUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);
    }


    protected function create(Request $request)
    {
        $validator = $this->validateCreate($request->all());

        if ($validator->fails()) {
            return redirect('admin/settings/users/new')->withInput()->withErrors($validator);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect('admin/settings/users');
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();

        return view('pages.users.users-edit', [
          'user' => $user,
          'roles' => $roles
        ]);
    }


    protected function update(Request $request)
    {
        $validator = $this->validateUpdate($request->all());

        if ($validator->fails()) {
            return redirect('admin/settings/users/edit/'.$request->id)->withInput()->withErrors($validator);
        }

        User::where('id', $request->id)
          ->update([
            'name' => $request->name,
          ]);
        
        $user = User::where('id', $request->id)->first();
        $user->syncRoles([$request->role]);

        return redirect('admin/settings/users');
    }


    public function delete($id)
    {
        $delete = User::where('id', $id)->delete();
        return redirect('admin/settings/users');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(DataTables $datatables)
    {
        $builder = User::query()->select('id', 'name', 'email');
        $current_user = Auth::user();

        $datatable = $datatables->eloquent($builder)
                        ->rawColumns([1, 5])
                        ->addColumn('role', function (User $user) {
                            return ucfirst($user->getRoleNames()[0]);
                        });    

        if ($current_user->can('delete_users','update_users')) {
            $datatable = $datatable->addColumn('edit', '{{$id}}');
        }

        return $datatable->make(false);
    }
}
