<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Users\Interface\UserRepositoryInterface;
use Yajra\DataTables\DataTables;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::get();
    }

    public function findById($id)
    {
        return User::with('store')->findOrFail($id);
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

    public function DataTables()
    {
        $users = User::query();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {

                $showBtn =  '<button ' .
                    ' class="btn btn-outline-info" ' .
                    ' onclick="showUser(' . $user->id . ')">Show' .
                    '</button> ';

                $editBtn =  '<button ' .
                    ' class="btn btn-outline-success" ' .
                    ' onclick="editUser(' . $user->id . ')">Edit' .
                    '</button> ';

                $deleteBtn =  '<button ' .
                    ' class="btn btn-outline-danger" ' .
                    ' onclick="destroyUser(' . $user->id . ')">Delete' .
                    '</button> ';

                return $showBtn . $editBtn . $deleteBtn;
            })
            ->rawColumns(
                [
                    'action',
                ]
            )
            ->make(true);
    }
}
