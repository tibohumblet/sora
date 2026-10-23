<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['email', 'password']);
        $user = $this->userService->createUser($data);

        return redirect()->route('users.create')->with('success', 'User created successfully.');
    }
}
