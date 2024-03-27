<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use App\Models\MagicProduct;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList()
    {
        $user = User::all();
        return view('administration.users.usersList',
            ['users' => $user]);
    }

    public function view(int $id)
    {
    $user = User::find($id);
    $purchases = Purchase::with(['items'])->where('user_id', $id)->get();

    return view('users.view', [
        'user' => $user,
        'purchases' => $purchases,
    ]);
    }

public function profile()
{
    $user = User::find(auth()->id());
    $purchases = Purchase::with(['items'])->where('user_id', auth()->id())->get();

    return view('users.profile', [
        'user' => $user,
        'purchases' => $purchases,
    ]);
}

    public function editForm(){
        $user = User::find(auth()->id());
        return view('users.edit', ['user' => $user]);
    }

    public function editProcess( Request $request){

    $request->validate(User::VALIDATION_RULES, User::VALIDATION_MESSAGES);

    $data = $request->except('_token');

    $user = User::find(auth()->id());
    $user->name = request('name');
    $user->email = request('email');

    if (!empty(request('password'))) {
        if(request('password') == request('password_confirmation')) {
            $user->password = \Hash::make(request('password'));
        } else {
            return back()->withErrors(['password' => 'La contraseña y la confirmación de la contraseña no coinciden']);
        }
    }

    $user->save();
    return redirect()->route('user.profile');
}

}
