<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\Interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::with('category')->get();
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $Product = Product::findOrFail($id);
        $Product->update($data);
        return $Product;
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }

    // Method tambahan khusus Product
    public function findByEmail($email)
    {
        return Product::where('email', $email)->first();
    }

}
