<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function loginView()
    {
        return view("login");
    }

    function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::where("username", $request->username)->first();

        if(!$user)
        {
            return redirect()->route("loginView")->with("error", "Username not found.");
        }

        if(!Hash::check($request->password, $user->password))
        {
            return redirect()->route("loginView")->with("error", "Password is wrong.");
        }

        Session::put("user", $user);

        return redirect()->route("home");
    }

    function registerView()
    {
        return view("register");
    }

    function register(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "repeatPassword" => "required"
        ]);

        $user = User::where("username", $request->username)->first();

        if($user)
        {
            return redirect()->route("registerView")->with("error", "Username is already taken.");
        }

        if($request->password != $request->repeatPassword)
        {
            return redirect()->route("registerView")->with("error", "Passwords must be the same.");
        }

        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        return redirect()->route("loginView")->with("success", "Account made.");
    }

    function logout()
    {
        Session::pull("user");

        return redirect()->route("loginView");
    }
}
