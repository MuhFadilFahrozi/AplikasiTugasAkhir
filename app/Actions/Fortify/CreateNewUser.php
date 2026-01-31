<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
    'name' => ['required', 'string', 'max:255'],
    'nim' => [
        'required', 
        'string',
        // Tambahin flag 'i' (case-insensitive) di regex biar nggak error 
        // kalau ada huruf kecil yang lolos dari frontend
        'regex:/^[A-Z0-9.]+$/i', 
        'unique:users,nim'
    ],
    // ... field lainnya
])->validate();

return User::create([
    'name' => $input['name'],
    'nim' => strtoupper(trim($input['nim'])), // DI SINI KITA PAKSA JADI GEDE
    'email' => $input['email'],
    'phone' => $input['phone'],
    'password' => Hash::make($input['password']),
]);
    }
}
