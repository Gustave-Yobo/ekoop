<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function view_profile(){
        $users = User::all();
        return view('admin.profile', compact('users'));
    }

    public function index()
    {
        //
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
