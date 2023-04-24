<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function profile($id) {
        $user = User::find($id);
        return view('auth/profile',[
            'user' => $user
        ]);
    }

    public function login() {
        return view('auth/login');
    }

    public function loginPOST(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
 
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect(route('index'));
        }

        return redirect(route('auth.login'))->with('message', 'Wrong creditnails');
    }
    public function registration() {
        return view('auth/registration');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => $request->name,
        ]);

        auth()->login($user);

        return redirect(route('index'));
    }

    public function destroy()
    {
        auth()->logout();
        
        return redirect(route('index'));
    }
}
