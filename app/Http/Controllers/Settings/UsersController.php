<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.users.users');
    }


    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(DataTables $datatables)
    {
        $builder = User::query()->select('id', 'name', 'email', 'created_at');

        return $datatables->eloquent($builder)
                          ->rawColumns([1, 4])
                          ->make(false);
    }
}
