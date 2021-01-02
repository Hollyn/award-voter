<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    public function register()
    {

        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect('/');
    }
}
