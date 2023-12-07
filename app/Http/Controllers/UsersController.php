<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList()
    {
        $user = User::all();
        return view ('administration.users.usersList',
        ['users'=> $user]);
    }
    public function view(int $id)
    {
        $user = User::find($id);
        $purchases = Purchase::with('product')->where('user_id', $id)->get();

        return view ('users.view', [
            'user'=> $user,
            'purchases' => $purchases,
        ]);
    }

}
