<?php

namespace App\Repositories\Store;

use App\Models\Store;
use App\Repositories\Store\Interface\StoreRepositoryInterface;

class StoreRepository implements StoreRepositoryInterface
{
    public function getAll()
    {
        return Store::get();
    }

    public function findById($id)
    {
        return Store::findOrFail($id);
    }

    public function create(array $data)
    {
        return Store::create($data);
    }

    public function update($id, array $data)
    {
        $Store = Store::findOrFail($id);
        $Store->update($data);
        return $Store;
    }

    public function delete($id)
    {
        return Store::destroy($id);
    }

    // Method tambahan khusus Store
    public function findByEmail($email)
    {
        return Store::where('email', $email)->first();
    }

    public function createOnlyName($data,$id)
    {
        return Store::create([
            'store_name' => $data['store_name'],
            'owner_id' => $id ?? null,
        ]);
    }
}
