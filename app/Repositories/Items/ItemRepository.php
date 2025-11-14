<?php

namespace App\Repositories\Items;

use App\Models\Item;
use App\Repositories\Items\Interface\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface
{
    public function getAll()
    {
        return Item::get();
    }

    public function findById($id)
    {
        return Item::findOrFail($id);
    }

    public function create(array $data)
    {
        return Item::create($data);
    }

    public function update($id, array $data)
    {
        $Item = Item::findOrFail($id);
        $Item->update($data);
        return $Item;
    }

    public function delete($id)
    {
        return Item::destroy($id);
    }

    // Method tambahan khusus Item
    public function findByEmail($email)
    {
        return Item::where('email', $email)->first();
    }
}
