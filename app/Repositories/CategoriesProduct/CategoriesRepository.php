<?php

namespace App\Repositories\CategoriesProduct;

use App\Models\CategoriesProduct;
use App\Repositories\CategoriesProduct\Interface\CategoriesRepositoryInterface;
use Yajra\DataTables\DataTables;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function getAll()
    {
        return CategoriesProduct::with('mainCategory')->get();
    }

    public function findById($id)
    {
        return CategoriesProduct::with('store')->findOrFail($id);
    }

    public function create(array $data)
    {
        return CategoriesProduct::create($data);
    }

    public function update($id, array $data)
    {
        $CategoriesProduct = CategoriesProduct::findOrFail($id);
        $CategoriesProduct->update($data);
        return $CategoriesProduct;
    }

    public function delete($id)
    {
        return CategoriesProduct::destroy($id);
    }

    // Method tambahan khusus CategoriesProduct
    public function findByEmail($email)
    {
        return CategoriesProduct::where('email', $email)->first();
    }

    public function DataTables()
    {
        $CategoriesProducts = CategoriesProduct::query();
        return DataTables::of($CategoriesProducts)
            ->addColumn('action', function ($CategoriesProduct) {

                $showBtn =  '<button ' .
                    ' class="btn btn-outline-info" ' .
                    ' onclick="showCategoriesProduct(' . $CategoriesProduct->id . ')">Show' .
                    '</button> ';

                $editBtn =  '<button ' .
                    ' class="btn btn-outline-success" ' .
                    ' onclick="editCategoriesProduct(' . $CategoriesProduct->id . ')">Edit' .
                    '</button> ';

                $deleteBtn =  '<button ' .
                    ' class="btn btn-outline-danger" ' .
                    ' onclick="destroyCategoriesProduct(' . $CategoriesProduct->id . ')">Delete' .
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

    public function getMainCategories()
    {
        return CategoriesProduct::whereNull('main_category')->get();
    }
}
