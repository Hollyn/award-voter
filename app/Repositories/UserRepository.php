<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUserByPhone($userPhone)
    {
        return User::where('phone', $userPhone)->first();
    }
}
