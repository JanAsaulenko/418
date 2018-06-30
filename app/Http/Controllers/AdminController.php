<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //{dd($users->all());

        $users = User::all();
        return view('admin.index')->withUsers($users);
    }


    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/admin');

    }
}