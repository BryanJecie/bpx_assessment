<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getActiveUsers(Request $request)
    {
        $activeUsers = $this->user->active()->get();

        return response()->json($activeUsers);
    }
}
