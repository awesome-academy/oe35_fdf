<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate();
        $data = [
            'users' => $user
        ];

        return view('admin.users.index', $data);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::put('message_delete', 'Success');

        return redirect()->back();
    }
}
