<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{

    public function logout()
    {
        auth(guard: 'admin')->logout();
        return redirect(route('posts.index'));
    }

    public function showLoginForm()
    {
        return view('authAdmin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string',],
            'password' => ['required']
        ]);


        if (auth(guard: 'admin')->attempt($data)){
            return redirect(route('posts.index'));
        }
        return redirect(route('login_admin'))->withErrors(['email'=>'Пользователь не найден']);
    }

    public function showRegisterForm()
    {
        return view('authAdmin.register');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = AdminUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);

        if ($user) {
            auth(guard: 'admin')->login($user);
        }
        return redirect(route('posts.index'));
    }


}
