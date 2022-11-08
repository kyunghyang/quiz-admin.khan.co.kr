<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render("Pages/Login");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required", "string", "max:500",
            "email" => "required|email|max:500|unique:admins",
            "contact" => "required", "string", "max:500",
            // "address" => "required", "string", "max:5000",
            "password" => "required|string|confirmed|min:8|max:20",
        ]);

        $admin = Admin::create(array_merge($request->all(),[
            "password" => Hash::make($request->password),
        ]));

        if($admin->email == "ssa4141@naver.com")
            $admin->update(["master" => true]);

        return redirect("/nova");
    }
}
