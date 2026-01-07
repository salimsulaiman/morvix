<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('currentUser')) {
    /**
     * @return User|null
     */
    function currentUser(): ?User
    {
        return Auth::user() instanceof User ? Auth::user() : null;
    }
}
