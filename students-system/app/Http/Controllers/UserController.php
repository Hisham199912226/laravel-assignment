<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users(){
        $users = User::all();
        return view('user.users', compact('users'));
    }

    public function promoteUser(User $user, Request $request){
        DB::update('update users set is_admin = 1 where id = ?',[$user->id]);

        return redirect(route('users'))->with('success', "{$user->name} promoted successfully!");
    }
}