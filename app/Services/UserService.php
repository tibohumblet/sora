<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\password;

class UserService
{

    public function getAllUsers(): array
    {
        return User::all()->toArray();
    }

    public function getUserById($id): ?User
    {
        return User::find($id);
    }

    public function getUserByEmail($email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function createUser(array $data): User
    {
        $validated = validator($data, [
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',        // At least one uppercase letter
                'regex:/[a-z]/',        // At least one lowercase letter
                'regex:/[0-9]/',        // At least one number
                'regex:/[^a-zA-Z0-9]/', // At least one special character
            ],
        ])->validate();

        return User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    }

    public function updateUser($id, array $data): ?User
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function deleteUser($id): bool
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }

}