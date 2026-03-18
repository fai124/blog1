<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->password = $request->password;
        $path = Storage::disk("public")->putFile("avatars", $request->file("avatar"));
        $user->avatar = $path;
        $user->save();
        return response()->json(["token" => $user->createToken("api")->plainTextToken]);
    }
    public function auth(UserRegisterRequest $request)
    {
        $user = User::where("username", $request->username)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return response()->json(["message" => "молодец", "token" => $user->createToken("api")->plainTextToken]);
        }
        return response()->json(["message" => "пользователь потеряшка", "errors" => ("password")]);
    }
}
