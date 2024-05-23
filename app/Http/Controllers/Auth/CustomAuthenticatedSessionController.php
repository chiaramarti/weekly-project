<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    protected function redirectTo()
    {
        return '/projects';
    }
}
