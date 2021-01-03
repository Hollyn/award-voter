<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Repositories\VoteRepository;

class LoginController extends Controller
{
    private $userRepository;
    private $voteRepository;

    public function __construct(UserRepository $userRepository, VoteRepository $voteRepository)
    {
        $this->userRepository = $userRepository;
        $this->voteRepository = $voteRepository;
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
            // check if the user voted already
            if ($this->voteRepository->hasUserVoted(Auth::id())) return redirect('voted');
            return redirect()->intended('/');
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
