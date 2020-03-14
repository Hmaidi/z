<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class profile extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }



}
