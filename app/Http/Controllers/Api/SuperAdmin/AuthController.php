<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:super_admins',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]);
        }

        $admin = SuperAdmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $admin->createToken($request->email)->plainTextToken;

        return response()->json([
            "status" => true,
            "admin" => $admin,
            "token" => $token,
            "message" => "Super Admin created successfully",
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

        $admin = SuperAdmin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                "status" => false,
                "message" => "Useremail or password incorrect!",
            ]);
        }

        $token = $admin->createToken($request->email)->plainTextToken;

        return new MessageResource([
            "status" => true,
            "admin" => $admin,
            "token" => $token,
            "message" => "LoggedIn successfully",
        ]);
    }
}
