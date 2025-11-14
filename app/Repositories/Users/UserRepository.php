<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Users\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::get();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    // Method tambahan khusus User
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
