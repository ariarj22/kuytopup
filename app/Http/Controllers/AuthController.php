<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function Register(Request $R) {
        try {
            $cred = new User();
            $cred->username = $R->username;
            $cred->password = Hash::make($R->password);
            $cred->name = $R->name;
            $cred->phone = $R->phone;
            $cred->save();

            $response = ['status'=>200, 'message'=>'Register successfully'];
            if (request()->wantsJson()) {
                return response()->json($response);
            }
            return redirect('/login')->with('success', 'Register successfully');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'Username is already taken');
            }
            return redirect()->back()->with('error', 'An error occurred while registering');
        }
    }

    public function Login(Request $R) {
        if (auth()->attempt(request()->only(['username', 'password']))) {
            $response = ['status' => 200, 'user' => auth()->user(), 'message' => 'Successfully login'];
            if (request()->wantsJson()) {
                return response()->json($response);
            }
            return redirect('/');
        }

        $response = ['status' => 500, 'message' => 'Invalid username or password'];
        if (request()->wantsJson()) {
            return response()->json($response);
        }
        return redirect()->back()->with('error', 'Invalid username or password');
    }

    public function Logout() {
        auth()->logout();

        return redirect('/login');
    }

    public function getUser($id) {
        $user = User::where('id', '=', $id)->get();

        return response()->json($user);
    }
}