<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]);
        }

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $admin->createToken($request->email)->plainTextToken;

        return response()->json([
            "status" => true,
            "admin" => $admin,
            "token" => $token,
            "message" => "Admin created successfully",
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]);
        }

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                "status" => false,
                "message" => "Useremail or password incorrect!",
            ]);
        }

        $token = $admin->createToken($request->email)->plainTextToken;

        return response()->json([
            "status" => true,
            "admin" => $admin,
            "token" => $token,
            "message" => "LoggedIn successfully",
        ]);
    }


    public function logout()
    {
        $admin = Auth::user();
        $admin->tokens()->delete();
        return response()->json([
            "status" => true,
            "message" => "LoggedOut successfully",
        ]);
    }
}
