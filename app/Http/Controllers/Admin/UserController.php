<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        // echo 'success'
        $allUser = User::orderBy('id', 'ASC')->get();
        return view('admin.user.all', compact('allUser'));
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function view()
    {
        return view('admin.user.view');
    }

    public function edit()
    {
        return view('admin.user.edit');
    }
}
