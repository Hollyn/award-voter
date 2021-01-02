<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;

class LoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {

        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {

        $userPhone = $request->input('phone');
        $user  = $this->userRepository->getUserByPhone($userPhone);

        if ($user == null) {
            return redirect('login')->withErrors([
                'login' => "Cannot find this phone number"
            ]);
        }

        if (Auth::loginUsingId($user->id)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

    public function home()
    {

        return view('pages.index');
    }
}
