<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function Register(Request $R) {
        $cred = new User();
        $cred->username = $R->username;
        $cred->password = Hash::make($R->password);
        $cred->name = $R->name;
        $cred->phone = $R->phone;
        $cred->save();

        $response = ['status'=>200, 'message'=>'Register successfully'];
        return response()->json($response);
    }

    public function Login(Request $R) {
        $user = User::where('username', $R->username)->first();

        if($user!='[]' && Hash::check($R->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['status' => 200, 'token'=> $token, 'user' => $user, 'message' => 'Successfully login'];
            return response()->json($response);
        } else if ($user == '[]') {
            $response = ['status' => 500, 'message' => 'No account found'];
            return response()->json($response);
        } else {
            $response = ['status' => 500, 'message' => 'wrong username'];
            return response()->json($response);
        }
    }

    public function getUser($id) {
        $user = User::where('id', '=', $id)->get();

        return response()->json($user);
    }
}